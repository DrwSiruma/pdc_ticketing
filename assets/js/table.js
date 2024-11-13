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
    ordering: true,
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