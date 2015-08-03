/**
 * Created by TD on 2015-08-01.
 */
(function(window, document){

    $(function(){

        //button event handling
        $('.add-term').on('click', function(){
           location.href="term?action=create"
        });

    });

})(window, document);