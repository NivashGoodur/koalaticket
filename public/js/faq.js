$ (function (){
    $(".visible-pannel img").click(function() {

        //Affichage du + ou -
        if(this.src.includes('plus')){
            this.src = "images/minus.png";
            $(this).parent().next().slideDown("slow");
        }else if (this.src.includes('minus')){
            this.src = "images/plus.jpg";
            $(this).parent().next().slideUp();
        }
    });
});