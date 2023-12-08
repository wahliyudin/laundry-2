<div class="d-flex align-items-center gap-2">
    <a href="{{ route('transaksi.show', $transaksi->getKey()) }}" class="btn btn-tertiary text-white btn-sm">
        <div class="d-flex align-items-center gap-2">
            <svg class="icon icon-xs" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span>Show</span>
        </div>
    </a>
    @if ($transaksi->status_bayar == \App\Enums\StatusBayar::LUNAS)
        <a href="{{ route('transaksi.print-pdf', $transaksi->getKey()) }}" target="_blank" class="btn btn-info btn-sm">
            <div class="d-flex align-items-center gap-2">
                <svg class="icon icon-xs" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
                    </path>
                </svg>
                <span>Print PDF</span>
            </div>
        </a>
    @endif
    @if ($transaksi->status == \App\Enums\Status::CLOSE && $transaksi->status_bayar == \App\Enums\StatusBayar::BELUM_LUNAS)
        <button class="btn btn-success text-white btn-sm" data-key="{{ $transaksi->getKey() }}" type="button"
            id="btn-bayar">
            <span class="indicator-label">
                <div class="d-flex align-items-center gap-2">
                    <svg class="icon icon-xs" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z">
                        </path>
                    </svg>
                    <span>Bayar</span>
                </div>
            </span>
            <span class="indicator-progress">
                <div class="d-flex align-items-center">
                    <span class="ms-1">Loading...</span>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
            </span>
        </button>
    @endif
    @if ($transaksi->status_bayar == \App\Enums\StatusBayar::BELUM_LUNAS)
        <button class="btn btn-secondary text-white btn-sm" data-key="{{ $transaksi->getKey() }}" type="button"
            id="btn-edit-status">
            <span class="indicator-label">
                <div class="d-flex align-items-center gap-2">
                    <svg class="icon icon-xs" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                        </path>
                    </svg>
                    <span>Status</span>
                </div>
            </span>
            <span class="indicator-progress">
                <div class="d-flex align-items-center">
                    <span class="ms-1">Loading...</span>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
            </span>
        </button>
        <button class="btn btn-info btn-sm" data-key="{{ $transaksi->getKey() }}" type="button" id="btn-edit">
            <span class="indicator-label">
                <div class="d-flex align-items-center gap-2">
                    <svg class="icon icon-xs" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                        </path>
                    </svg>
                    <span>Edit</span>
                </div>
            </span>
            <span class="indicator-progress">
                <div class="d-flex align-items-center">
                    <span class="ms-1">Loading...</span>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
            </span>
        </button>
    @endif
    <button class="btn btn-danger btn-sm" data-key="{{ $transaksi->getKey() }}" type="button" id="btn-delete">
        <span class="indicator-label">
            <div class="d-flex align-items-center gap-2">
                <svg class="icon icon-xs" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                    </path>
                </svg>
                <span>Delete</span>
            </div>
        </span>
        <span class="indicator-progress">
            <div class="d-flex align-items-center">
                <span class="ms-1">Loading...</span>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </div>
        </span>
    </button>
</div>
