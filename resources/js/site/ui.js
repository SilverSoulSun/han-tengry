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
            
            $('.lazy').Lazy({
                //effect: 'fadeIn',
                //effectTime: 300,
                threshold: 1000,
                // callback
                afterLoad: function(element) {
                    element.css({"background-size": "cover"});
                },
            });

            $('.open-gallery').on('click', function(){
                var id = $(this).data('id');
                return self.galleryOpen(id);

            });

            $('#gallery .btn-close-gallery').on('click', function(){
                return self.galleryClose();
            });

            $('#gallery .nav-next').on('click', function(){
                return self.galleryNext();
            });

            $('#gallery .nav-prev').on('click', function(){
                return self.galleryPrev();
            });

            //wrap f word
            if($('.characteristic').length != 0) {
                $('.characteristic .value').each(function(i, obj) {
                    self.wrapFirstWord($(obj));
                });
            }


            $(document).on('click', '.page-animal .nav a', function(event){
                event.preventDefault();

                $('html, body').animate({
                    scrollTop: $( $.attr(this, 'href') ).offset().top
                }, 500);
            });

        }


        UI.prototype.galleryOpen = function(photo_id){
            var self = this;
            $('.header-fixed').hide();

            $(document).keydown(function(e) {                    
                switch(e.which) {
                    case 37: // left
                    self.galleryPrev();
                    break;

                    case 39: // right
                    self.galleryNext();
                    break;

                    case 27: // esc
                    self.galleryClose();
                    break;

                    default: return; // exit this handler for other keys
                }
                e.preventDefault(); // prevent the default action (scroll / move caret)
            });

            $(window).disablescroll();

            $('#gallery').addClass('zoomIn');
            $('#gallery').show();

            gallery.active = true;

            if(gallery.photos == null){
                API.getPhotos(function(response){
                    gallery.total = response.total;
                    gallery.photos = response.data;

                    $.each(gallery.photos, function( key, photo ) {
                        if (photo.id == photo_id){
                            gallery.curent_index = key;
                        }
                    });

                    self.galleryLoadPhoto(gallery.photos[gallery.curent_index]);
                });
            }else{
                $.each(gallery.photos, function( key, photo ) {
                    if (photo.id == photo_id){
                        gallery.curent_index = key;
                    }
                });
                self.galleryLoadPhoto(gallery.photos[gallery.curent_index]);
            }
    
        };

        UI.prototype.galleryLoadPhoto = function(photo){
            
            $('#gallery .image').html('');
            $('#gallery .image').hide();
            $('#gallery .loader').hide();

            setTimeout(function(){
                $('#gallery .loader').show();
            }, 1000);

            $('#gallery .name').html(photo.name);
            //var index = gallery.curent_index + 1;
            //$('#gallery .index').html(index + '/' + gallery.total);

            $('#gallery .author-link').html(photo.author);
            $('#gallery .author-link').attr('href', photo.author_profile);
            $('#gallery .license').html(photo.license);
            
            gallery.tmpImg = new Image();
            gallery.tmpImg.src =  '/uploads/animals/photos/full/original/' + photo.image;

            gallery.tmpImg.onload = function() {
                $('#gallery .loader').hide();
                $('#gallery .image').html(gallery.tmpImg);       
                $('#gallery .image').show();

                //preloader
                $.each( gallery.photos, function( key, photo ) {
                    if (key > (gallery.curent_index) && key < (gallery.curent_index + 4) ) {
                        var preloadImg = new Image();
                        preloadImg.src = '/uploads/animals/photos/full/original/' + photo.image;
                    }
                }); 
            }
        }

        UI.prototype.galleryNext = function(){
            var self = this;

            if(gallery.curent_index == gallery.total - 1){
                gallery.curent_index = 0;
            }else{
                gallery.curent_index++;
            }

            self.galleryLoadPhoto(gallery.photos[gallery.curent_index]);
        }

        UI.prototype.galleryPrev = function(){
            var self = this;

            if(gallery.curent_index == 0){
                gallery.curent_index = gallery.total - 1;
            }else{
                gallery.curent_index = gallery.curent_index - 1;
            }
            
            
            self.galleryLoadPhoto(gallery.photos[gallery.curent_index]);
        }

        UI.prototype.galleryClose = function(){

            gallery.active = false;
            $('.header-fixed').show();
            $(document).unbind('keydown');

            $('#gallery').addClass('zoomOut');
            $('#gallery').bind('oanimationend animationend webkitAnimationEnd', function() { 
                $(window).disablescroll("undo");

                $('#gallery').hide();
                $('#gallery').unbind('oanimationend animationend webkitAnimationEnd');
                $('#gallery').removeClass('zoomOut');

                $('#gallery .image').html('');
                $('#gallery .image').hide();

                $('#gallery .name').html('');
                //$('#gallery .index').html('');
                $('#gallery .author-link').html('');
                $('#gallery .license').html('');
            });
    
        }


        UI.prototype.wrapFirstWord = function (div) { 
            //get the first word
            var firstWord = div.text().split(' ')[0];

            //wrap it with span
            var replaceWord = "<span>" + firstWord + "</span>";

            //create new string with span included
            var newString = div.html().replace(firstWord, replaceWord);

            //apply to the divs
            div.html(newString);
        };


        return new UI();
    }());
});
