var payCheck = {
    init: function(){
         $('#calculate').on('submit',function(event){
            event.preventDefault();
            payCheck.getSalary();
        });
    },

    getSalary: function(){
        var salary = $('#salary').val();
        payCheckService.sendSalary(salary, payCheck.showResult);
    },

    showResult: function(result){

        var json = JSON.parse(result);
        var INSS = json.INSS,
            IRPF =  json.IRPF,
            liquidSalary = json.liquidSalary;

        $('#inss').html(INSS);
        $('#irpf').html(IRPF);
        $('#liquid').html(liquidSalary);
    }
};


payCheck.init();
