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
    var table = $('#postbl').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: true,
    lengthChange: true,
    });
});
$(document).ready(function () {
    var table = $('#inttbl').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: true,
    lengthChange: true,
    });
});
$(document).ready(function () {
    var table = $('#painttbl').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: true,
    lengthChange: true,
    });
});
$(document).ready(function () {
    var table = $('#tetbl').DataTable({
    searching: true,
    paging: true,
    info: true,
    ordering: true,
    lengthChange: true,
    });
});