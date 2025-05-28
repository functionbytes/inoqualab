jQuery(document).ready(function() {
    $(".summernote").summernote({
        height: 190,
        minHeight: null,
        maxHeight: null,
        focus: !1
    })
    ,
    $(".observation").summernote({
        toolbar: [
          ],
        height: 190,
        minHeight: null,
        maxHeight: null,
        focus: !1
    }), $(".inline-editor").summernote({
        airMode: !0
    })

    $(".response").summernote({
        toolbar: [
          ],
        height: 190,
        minHeight: null,
        maxHeight: null,
        focus: !1
    }), $(".inline-editor").summernote({
        airMode: !0
    })

    $('.disabled').summernote('disable');
    $('.disableds').summernote('disable');


}), window.edit = function() {
    $(".click2edit").summernote()
}, window.save = function() {
    $(".click2edit").summernote("destroy")
};
