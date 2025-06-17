!function(s){"use strict";s("#sidebarToggle, #sidebarToggleTop").on("click",function(e){s("body").toggleClass("sidebar-toggled"),s(".sidebar").toggleClass("toggled"),s(".sidebar").hasClass("toggled")&&s(".sidebar .collapse").collapse("hide")}),s(window).resize(function(){s(window).width()<768&&s(".sidebar .collapse").collapse("hide"),s(window).width()<480&&!s(".sidebar").hasClass("toggled")&&(s("body").addClass("sidebar-toggled"),s(".sidebar").addClass("toggled"),s(".sidebar .collapse").collapse("hide"))}),s("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel",function(e){if(768<s(window).width()){var o=e.originalEvent,l=o.wheelDelta||-o.detail;this.scrollTop+=30*(l<0?1:-1),e.preventDefault()}}),s(document).on("scroll",function(){100<s(this).scrollTop()?s(".scroll-to-top").fadeIn():s(".scroll-to-top").fadeOut()}),s(document).on("click","a.scroll-to-top",function(e){var o=s(this);s("html, body").stop().animate({scrollTop:s(o.attr("href")).offset().top},1e3,"easeInOutExpo"),e.preventDefault()})}(jQuery);

document.addEventListener('DOMContentLoaded', function () {
    const rejectReason = document.getElementById('rejectReason');
    if (rejectReason) {
        rejectReason.addEventListener('change', function() {
            const otherReasonContainer = document.getElementById('otherReasonContainer');
            if (this.value === 'Other') {
                otherReasonContainer.style.display = 'block';
            } else {
                otherReasonContainer.style.display = 'none';
            }
        });
    }
});

function setFinalReason() {
    const selectBox = document.getElementById('rejectReason');
    const otherReasonInput = document.getElementById('otherReason');
    const finalReasonInput = document.getElementById('finalReason');

    if (selectBox.value === 'Other') {
        // Use the value from the text input if 'Other' is selected
        finalReasonInput.value = otherReasonInput.value.trim();
    } else {
        // Use the selected value from the dropdown
        finalReasonInput.value = selectBox.value;
    }
}

function showOtherReason() {
    var reasonSelect = document.getElementById("rschdReason");
    var otherRReasonContainer = document.getElementById("otherRReasonContainer");
    if (reasonSelect.value == "3") {
        otherRReasonContainer.style.display = "block";
    } else {
        otherRReasonContainer.style.display = "none";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const rasgn = document.getElementById('rasgn_btn');
    if (rasgn) {
        rasgn.addEventListener('change', function() {
            var reasonSelect = document.getElementById("rschdReason");
            var otherRReasonInput = document.getElementById("otherRReason");
            var finalRReasonInput = document.getElementById("finalRReason");

            if (reasonSelect && finalRReasonInput) {
                if (reasonSelect.value == "3" && otherRReasonInput) {
                    finalRReasonInput.value = otherRReasonInput.value.trim();
                } else {
                    finalRReasonInput.value = reasonSelect.options[reasonSelect.selectedIndex].text;
                }
            }
        });
    }
});

function showOtherReason2() {
    var reasonSelect2 = document.getElementById("rasgnReason");
    var otherRReasonContainer2 = document.getElementById("otherRReasonContainer2");
    if (reasonSelect2.value == "3") {
        otherRReasonContainer2.style.display = "block";
    } else {
        otherRReasonContainer2.style.display = "none";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const rasgnBTN = document.getElementById('rasgn_btn2');
    if (rasgnBTN) {
        rasgnBTN.addEventListener('click', function(event) {
            var reasonSelect2 = document.getElementById("rasgnReason");
            var otherRReasonInput2 = document.getElementById("otherRReason2");
            var finalRReasonInput2 = document.getElementById("finalRReason2");

            if (reasonSelect2.value == "3") {
                finalRReasonInput2.value = otherRReasonInput2.value.trim();
            } else {
                finalRReasonInput2.value = reasonSelect2.options[reasonSelect2.selectedIndex].text;
            }
        });
    }
});

function setFinalRReason() {
    var reasonSelect = document.getElementById("rschdReason");
    var otherRReasonInput = document.getElementById("otherRReason");
    var finalRReasonInput = document.getElementById("finalRReason");

    if (!reasonSelect || !finalRReasonInput) return true; // allow submit if not present

    if (reasonSelect.value == "3" && otherRReasonInput) {
        finalRReasonInput.value = otherRReasonInput.value.trim();
    } else {
        finalRReasonInput.value = reasonSelect.value;
    }
    // Prevent submit if required fields are empty
    if (!finalRReasonInput.value) {
        alert("Please specify a reason for re-schedule.");
        return false;
    }
    return true;
}