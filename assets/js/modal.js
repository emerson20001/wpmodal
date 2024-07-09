document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('modalwp-modal');
    var span = document.getElementsByClassName('modalwp-close')[0];
    var closeTime = parseInt(modalwp_settings.close_time, 10) * 1000;
    var expiryDate = modalwp_settings.expiry_date;
    var currentDate = new Date().toISOString().split('T')[0];
    var delayTime = modalwp_settings.delay_time;

    setTimeout(function() {
        if (modal && (!expiryDate || currentDate <= expiryDate)) {
            modal.style.display = 'block';

            if (closeTime > 0) {
                setTimeout(function() {
                    modal.style.display = 'none';
                }, closeTime);
            }
        }
    }, delayTime);

    span.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
});
