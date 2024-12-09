<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="modalCancelBtn"
                    data-bs-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger" id="confirmDeleteButton">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteLinks = document.querySelectorAll('.delete');

        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var modal = new coreui.Modal(document.getElementById(
                    'deleteConfirmationModal'));
                document.getElementById('confirmDeleteButton').href = this.getAttribute(
                    'href');
                modal.show();
            });
        });
    });

    document.getElementById('modalCancelBtn').addEventListener('click', function() {
        var modal = new coreui.Modal(document.getElementById('deleteConfirmationModal'));
        modal.hide();
    });
</script>
