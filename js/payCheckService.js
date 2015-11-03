var payCheckService = {
    sendSalary: function(salary, callback){
        $.ajax({
            url: "controller/PaycheckController.php",
            data: "salary=" + salary,
            success:function(result){
               callback(result);
            }
        });
    }
};
