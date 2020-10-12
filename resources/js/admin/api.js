window.API = (function() {

    function API() {
        var pathArray = window.location.pathname.split( '/' );
        var domain_url = window.location.hostname +(location.port ? ':'+location.port: '');
        
        this.page_slug = pathArray[1];
        // this.subpage_name = pathArray[2];
        // this.subsubpage_name = pathArray[3];

        this.siteRoot = 'http://'+domain_url;
        this.apiUrl = 'http://'+domain_url+'/data/';
        
        this.page_name = false;
        this.current_user_id = false;
        this.islogin = false;

        this.page = false;
        this.lastPage = false;
        this.type = false;

        this.conditions = {};

    }

    API.prototype.getItems = function(type, data, response) {
        var api = this;

        $.ajax({
            dataType: "json", 
            type: 'GET',
            data: data,
            url: api.apiUrl + type, 
            beforeSend: function(){

            },
            success: function(answ){
                response(answ);
            }
        });
    }

    API.prototype.getPhotos = function(data, response) {
        var api = this;

        $.ajax({
            dataType: "json", 
            type: 'GET',
            data: data,
            url: api.apiUrl + 'get-photos', 
            beforeSend: function(){

            },
            success: function(answ){
                response(answ);
            }
        });
    }

    API.prototype.cropImage = function(data, response) {
        var api = this;

        $.ajax({
            dataType: "json", 
            type: 'POST',
            data: data,
            url: api.apiUrl + 'cropper', 
            beforeSend: function(){

            },
            success: function(answ){
                response(answ);
            }
        });
    }

    API.prototype.importPhotos = function(data, response) {
        var api = this;

        $.ajax({
            dataType: "json",
            type: 'POST',
            data: data,
            url: api.apiUrl + 'import-photos', 
            beforeSend: function(){

            },
            success: function(answ){
                response(answ);
            }
        });
    }



    return new API();
}());