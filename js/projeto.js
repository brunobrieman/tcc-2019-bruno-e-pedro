    function myFunction(id) {
        //update 1

    var element = document.getElementById(id);
    element.classList.add("nao_aparece");
    
    var bt = 'bt' + id;
    
    var element2 = document.getElementById(bt);
    element2.classList.remove("nao_aparece");
    }

   function myFunction2(id) {
    //update para 0
    var bt = 'bt' + id;
    var element = document.getElementById(bt);
    element.classList.add("nao_aparece");
    

    var element2 = document.getElementById(id);
    element2.classList.remove("nao_aparece");
    }

     //btn.classList.add("nao_aparece");

      //botao.classList.remove("nao_aparece");
