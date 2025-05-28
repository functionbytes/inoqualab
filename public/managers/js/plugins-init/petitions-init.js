jQuery(document).ready(function() {
    $(".petitions").summernote({
        height: 190,
        minHeight: null,
        maxHeight: null,
        focus: !1
    }), $(".inline-editor").summernote({
        airMode: !0
    })
}), window.edit = function() {
    $(".click2edit").summernote()
}, window.save = function() {
    $(".click2edit").summernote("destroy")
};
