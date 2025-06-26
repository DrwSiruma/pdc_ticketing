// system log table
$(document).ready(function () {
    var table = $('#syslogtbl').DataTable({
    searching: false,
    paging: true,
    info: true,
    ordering: false,
    lengthChange: true
    });
});

// accounts table
$(document).ready(function () {
    var table = $('#acctbl').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: true,
    lengthChange: true,
    });
});

// inventory tables
$(document).ready(function () {
    var table = $('#itcattbl').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: [[0, 'desc']],
    lengthChange: true,
    });
});
$(document).ready(function () {
    var table = $('#maincattbl').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: true,
    lengthChange: true,
    });
});

// ticket-history
$(document).ready(function () {
    var table = $('#thtbl').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: true,
    lengthChange: true,
    });
});

// notification
$(document).ready(function () {
    var table = $('#notif_tbl').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: false,
    lengthChange: true,
    });
});

// ticket table
// $(document).ready(function () {
//     var table = $('#pendingtck_tbl').DataTable({
//     searching: true,
//     paging: true,
//     info: true,
//     ordering: true,
//     lengthChange: true,
//     order: [[0, 'desc']],
//     });
// });
// $(document).ready(function () {
//     var table = $('#opentck_tbl').DataTable({
//     searching: true,
//     paging: true,
//     info: true,
//     ordering: true,
//     lengthChange: true,
//     order: [[0, 'desc']],
//     });
// });
// $(document).ready(function () {
//     var table = $('#overdue_tbl').DataTable({
//     searching: true,
//     paging: true,
//     info: true,
//     ordering: true,
//     lengthChange: true,
//     order: [[0, 'desc']],
//     });
// });
// $(document).ready(function () {
//     var table = $('#closetck_tbl').DataTable({
//     searching: true,
//     paging: true,
//     info: true,
//     ordering: true,
//     lengthChange: true,
//     order: [[0, 'desc']],
//     });
// });
// $(document).ready(function () {
//     var table = $('#rejtck_tbl').DataTable({
//     searching: true,
//     paging: true,
//     info: true,
//     ordering: true,
//     lengthChange: true,
//     order: [[0, 'desc']],
//     });
// });