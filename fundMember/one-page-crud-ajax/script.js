$('table').dataTable();
viewData();
$('#update').prop("disabled",true);

function viewData(){
    $.get('server.php', function(data){
        $('tbody').html(data)
    })
}

function saveData(){
    var id = $('#id').val()
    var name = $('#nm').val()
    var email = $('#em').val()
    var phone = $('#hp').val()
    var address = $('#ad').val()
    $.post('server.php?p=add', {id:id, nm:name, em:email, hp:phone, ad:address}, function(data){
        viewData()
        $('#id').val(' ')
        $('#nm').val(' ')
        $('#em').val(' ')
        $('#hp').val(' ')
        $('#ad').val(' ')
    })
}

function editData(id, nm, em, hp, ad) {
    $('#id').val(id)
    $('#nm').val(nm)
    $('#em').val(em)
    $('#hp').val(hp)
    $('#ad').val(ad)
    $('#id').prop("readonly",true);
    $('#save').prop("disabled",true);
    $('#update').prop("disabled",false);
}

function updateData(){
    var id = $('#id').val()
    var name = $('#nm').val()
    var email = $('#em').val()
    var phone = $('#hp').val()
    var address = $('#ad').val()
    $.post('server.php?p=update', {id:id, nm:name, em:email, hp:phone, ad:address}, function(data){
        viewData()
        $('#id').val(' ')
        $('#nm').val(' ')
        $('#em').val(' ')
        $('#hp').val(' ')
        $('#ad').val(' ')
        $('#id').prop("readonly",false);
        $('#save').prop("disabled",false);
        $('#update').prop("disabled",true);
    })
}

function deleteData(id){
    $.post('server.php?p=delete', {id:id}, function(data){
        viewData()
    })
}

function removeConfirm(id){
    var con = confirm('Are you sure, want to delete this data!');
    if(con=='1'){
        deleteData(id);
    }
}

$(function() {

    var $sidebar   = $("#sidebar"), 
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 15;

    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });
    
});