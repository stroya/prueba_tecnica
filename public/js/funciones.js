/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $(".btn-olvido-password").click(function () {
        $("#modal-olvido-password").modal('show');
    });
    
    $(".btn-registrar").click(function () {
        $("#modal-registrar-usuario").modal('show');
    });
});