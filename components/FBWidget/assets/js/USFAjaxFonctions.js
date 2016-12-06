/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $(document).on('click', '.follow, .unfollow', function () {
        //alert('test');
        var element = this;
        var urlLink = $(element).parent('a').attr('href');

        var dataSID = $(element).data('sid');
        var dataUID = $(element).data('uid');
        $.ajax({
            url: urlLink,
            data: {idUser: dataUID, idSoftware: dataSID},
            type: 'post',
            success: function (result) {
                $(element).parent('a').replaceWith(result);
            }
        });
        return false;
    }
    );

}
);
