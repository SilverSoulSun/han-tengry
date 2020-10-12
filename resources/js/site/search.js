$( function() {


    $(".search-field").autocomplete({
        source: function( request, response ) {
            $.ajax( {
                url: "/api/animals/search/"+request.term,
                data: {
                    term: request.term
                },
                success: function( data ) {
                    //console.log(data);
                    var result = $.map(data,function(elem){
                        var temp = {'value':elem.name, 'id':elem.url }
                        console.log(temp)
                        return {'value':elem.name, 'id':elem.url };
                    })
                    /*  result= data[
                     {'value':"tiger",'id':"teger"},
                     {'value':"tiger",'id':"teger"}
                     ]*/
                    response( result );
                }
            } );
        },
        minLength: 2,
        select: function( event, ui ) {
            window.location.href = "/" + ui.item.id;
        }
    });
} );
