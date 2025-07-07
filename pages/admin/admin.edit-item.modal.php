<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="edit-itemlist">
        <div class="modal-header">
          <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="item_id" id="edit_item_id">
          <div class="form-group">
            <label for="edit_item_name">Item Name</label>
            <input type="text" class="form-control" name="item_name" id="edit_item_name" required>
          </div>
        </div>
        <input type="hidden" class="form-control" name="categ_name" id="edit_categ_name" value="<?php echo $_GET['item']; ?>" required>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
// Fill modal with item data
window.addEventListener('DOMContentLoaded', function() {
  var editBtns = document.querySelectorAll('.edit-item-btn');
  editBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      var itemId = this.getAttribute('data-id');
      var itemName = this.getAttribute('data-name');
      document.getElementById('edit_item_id').value = itemId;
      document.getElementById('edit_item_name').value = itemName;
      var modal = document.getElementById('editItemModal');
      if (typeof $ !== 'undefined' && $(modal).modal) {
        $(modal).modal('show');
      } else {
        modal.classList.add('show');
        modal.style.display = 'block';
        modal.removeAttribute('aria-hidden');
        modal.setAttribute('aria-modal', 'true');
        document.body.classList.add('modal-open');
        // Add backdrop
        var backdrop = document.createElement('div');
        backdrop.className = 'modal-backdrop fade show';
        backdrop.id = 'editItemModalBackdrop';
        document.body.appendChild(backdrop);
        // Close modal on close button
        modal.querySelector('.close').onclick = function() {
          modal.classList.remove('show');
          modal.style.display = 'none';
          modal.setAttribute('aria-hidden', 'true');
          modal.removeAttribute('aria-modal');
          document.body.classList.remove('modal-open');
          var bd = document.getElementById('editItemModalBackdrop');
          if (bd) bd.remove();
        };
      }
    });
  });
});
</script>