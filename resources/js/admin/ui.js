$(function() {
    window.UI = (function() {

        function UI() {
            this.init();
            
        }

        UI.prototype.init = function() {
            this.setupListners();
        }


        UI.prototype.setupListners = function() {
            var self = this;
            
            $(".chosen").chosen();



            //cropper

            $('.cropper-type-select').on('change', function(){
                var type = $(this).val();
                var path = $(this).find(':selected').data('path');

                $('.image-path').val(path);

                API.getItems(type, null, function(response){
                    $('.cropper-items').html('');
                    $('.cropper-items').append('<option></option>');

                    response.forEach(function(item, i, arr) {
                        if(item.cover != null){
                            if(type == 'animals'){
                                $('.cropper-items').append('<option value="' + item.cover.image + '">' + item.name + '</option>');
                            }else{
                                $('.cropper-items').append('<option value="' + item.cover + '">' + item.name + '</option>');
                            }
                        }
                    });

                    $(".chosen").trigger("chosen:updated");
                });
            });

            $('.cropper-items').on('change', function(){
                var path = $('.image-path').val();
                var imageSrc = path + 'original/' + $(this).val();

                $('.image-name').val($(this).val());
                $('.image').html('loading...');
                
                $('.btn-crop-submit').hide();
                $('.ratio-btns div').removeClass('active');

                var tmpImg = new Image();
                tmpImg.src =  imageSrc;
                tmpImg.className = 'cropper-image';
                tmpImg.onload = function() {
                    $('.image').html(tmpImg);

                    cropperImage = $('.cropper-image').cropper({
                        aspectRatio: 1 / 1,
                        autoCropArea: 1,
                        movable: false,
                        scalable: false,
                        zoomable: false,
                        viewMode: 1,

                        crop: function(e) {
                            // Output the result data for cropping image.
                            $('.crop-data-x').val(Math.round(e.x));
                            $('.crop-data-y').val(Math.round(e.y));
                            $('.crop-data-width').val(Math.round(e.width));
                            $('.crop-data-height').val(Math.round(e.height));
                            //$('.crop-data-rotate').val(Math.round(e.rotate));
                            //$('.crop-data-scaleX').val(Math.round(e.scaleX));
                            //$('.crop-data-scaleY').val(Math.round(e.scaleY));
                        }
                    });


                    $('.cropper-image').on('built.cropper', function (e) {
                        $('.btn-crop-submit').show();
                        $(".ratio-btns div").first().addClass('active');
                        $('.image-ratio').val('1x1');

                        self.changeCropBoxMin();
                    });                    
                };
                
            });

            $('.ratio-btns').on('click', 'div', function(){
                $('.ratio-btns div').removeClass('active');
                $(this).addClass('active');
                $('.image-ratio').val($(this).html());


                //var ratio = parseInt($(this).data('ratio'));
                //alert(ratio);
                var ratio = $(this).data('ratio')
                //console.log(ratio);
                $('.cropper-image').cropper( 'setAspectRatio' , ratio );
                self.changeCropBoxMin();

            });

            $( ".cropper-form" ).on( "submit", function( event ) {
                event.preventDefault();

                var data = $( this ).serializeArray();

                $('.btn-crop-submit').val('cropping...');
                $('.btn-crop-submit').prop('disabled', true);

                API.cropImage(data, function(response){
                    $('.btn-crop-submit').val('Crop');
                    $('.btn-crop-submit').prop('disabled', false);
                });
            });
            
            //end cropper

            //import props

            $("#fileuploader").uploadFile({
                url: $('#file_upload_path').val(),
                //url: "/data/import-properties",
                multiple:false,
                dragDrop:false,
                fileName: "myfile",
                allowedTypes: "csv",
                uploadStr: "Select file",
                onSuccess:function(files,data,xhr,pd)
                {
                    //console.log(data); 
                    $('.results').html( JSON.stringify(data) );
                }
            });


            //end import


            //import photos

            if($('.animals').length){
                API.getItems('animals', null, function(response){
                    $('.animals').html('');
                    $('.animals').append('<option></option>');

                    response.forEach(function(item, i, arr) {
                        console.log(item.meta);
                        $('.animals').append('<option value="' + item.id + '" data-scientific-name="' + item.scientific_name + '" data-common-names="' + ((item.meta != null) ? item.meta.common_names : '') + '" >' + item.name + '</option>');
                    });

                    $(".chosen").trigger("chosen:updated");
                });
            }

            $('.animals').on('change', function(){
                $('.import-inputs').show();
                $('.query').val($(this).find(":selected").text());

                var sn = $(this).find(":selected").data('scientific-name');
                $('.scientific-name').val(sn);

                var cn = $(this).find(":selected").data('common-names');
                $('.common-names').val(cn);

                $('.btn-import-photos').hide();
                $('.results').html('');
                $('.total').html('');
            });


            $('.btn-load-photos').on('click', function(){
                var data = {};

                $('.btn-load-photos').html('Loading...');
                $('.total').html('');
                $('.btn-load-photos').prop('disabled', true);
                $('.btn-import-photos').hide();

                data['query'] = $('.query').val();
                data['per_page'] = $('.per-page').find(":selected").val();
                data['page'] = $('.page-num').find(":selected").val();
                data['license'] = $('.license').find(":selected").val();

                API.getPhotos(data, function(response){
                    //console.log(response);
                    //$('.results').html( JSON.stringify(response) );
                    $('.results').html('');
                    $('.total').html('Total: ' + response.total);

                    $.each( response.photos, function( key, photo ) {
                        var checkbox = '<div class="photo">';
                        if(photo.exists != true){
                            checkbox = checkbox + '<input type="checkbox" name="photos[]" value="' + photo.id + '">';
                        }else{
                            checkbox = checkbox + '<span>Already imported</span>';
                        }
                        checkbox =  checkbox + '<a class="image" target="_blank" href="' + photo.original_page + '"><img src="' + photo.sizes.thumbnail.source + '"></a>';
                        checkbox =  checkbox + '<div class="name">' + photo.title + '</div></div>';

                        $('.results').append(checkbox);
                    });
                    


                    $('.btn-load-photos').html('Load photos');
                    $('.btn-load-photos').prop('disabled', false);
                    $('.btn-import-photos').show();
                });
            });


            $('.btn-import-photos').on('click', function(){
                
                $('.btn-import-photos').html('Importing...');
                $('.btn-import-photos').prop('disabled', true);

                var data = $('#form-photos').serializeArray();
                //console.log(data);

                API.importPhotos(data, function(response){
                    $('.photos-list input:checked').remove();

                    $('.btn-import-photos').html('Import');
                    $('.btn-import-photos').prop('disabled', false);
                });
            });

            //end import

        }


        UI.prototype.popupClose = function(){

            //$('.popup').remove(); 
            //$(document.body).removeClass('noscroll');
    
        }

        UI.prototype.changeCropBoxMin = function() {
            var canvasData = $('.cropper-image').cropper('getCanvasData');

            var scalew = canvasData.naturalWidth / canvasData.width;
            var scaleh = canvasData.naturalHeight / canvasData.height;

            var cropper = cropperImage.data('cropper');
            var cropBox = cropper.cropBox;

            var smw = $('.ratio-btns .active').data('min-w');
            var smh = $('.ratio-btns .active').data('min-h');

            cropBox.minWidth = smw / scalew;
            cropBox.minHeight = smh / scaleh;
        }


        return new UI();
    }());
});
