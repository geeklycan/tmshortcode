;

(function($){
    $(document).ready(function(){
        //alert("hello");
        
        QTags.addButton( "sg", "Resposive Slider", getData );

    });

    function getData(){
        var title = prompt("Enter Slider Title: ");
        var ids = prompt("Image ids separated by comma: ");

       	$('#content').append('[responsiveslider title="'+title+'" id="'+ids+'"]');
    }
})(jQuery);