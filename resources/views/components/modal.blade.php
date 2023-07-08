<!-- Small Modal -->
<div class="modal fade" id="becomeSeller" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Perhatian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/become-seller" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin menjadi Penjual?</p>
                    {{-- <small>Keterangan : Jika 'Ya' ingin menjadi Penjual, menunggu konfirmasi dari admin untuk
                        menyerujuinya</small> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
