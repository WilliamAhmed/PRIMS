/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//JQuery UI Functions
$(function(){
    $('#loginButton').button();
    $('#createButton').button();
    $('#updateButton').button();
    $('#closeButton').button();
    $('#backButton').button();
});

$(function(){
    $('#datepicker').datepicker({dateFormat: "yy-mm-dd"});
});

$(function(){
   $('#confirmDialog').dialog(); 
});

//Data Table
$(function(){
   $('#dataTable').dataTable();
});


//Go Back Function
function goBack(){
    window.history.back();
};
