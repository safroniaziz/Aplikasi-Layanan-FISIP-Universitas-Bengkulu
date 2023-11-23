<div>
    <div class="row" style="  height:40vh;">
        <div class="col-md-6">
            <form wire:submit.prevent="simpan" method="POST">
                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">ID Youtube</label>
                            <input type="text" class="form-control" name="id_youtube" wire:model="id_youtube">
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-flat" id="btnSubmit"><i class="fa fa-check-circle"></i>&nbsp;Simpan Data</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div style="width: 100%; height:40vh;">
                @if($link)

                <div style="width: 100%; height: 100%;background-color: #ccc;display: grid;  ">
                    <iframe wire:loading.remove wire:target="simpan" class="w-full h-full " style="width: 100%; height:100%;" src="https://www.youtube.com/embed/{{ $link }}?autoplay=1&controls=1&loop=1&mute=0" frameborder="0" allow="  autoplay;  " allowfullscreen></iframe>
                    <div wire:loading wire:target="simpan" style="place-self: center;">

                        <span style="font-weight: 800; padding: 10px 0px;" ;>Processing...</span>
                    </div>
                </div>
                <style>
                    @keyframes spin {
                        to {
                            transform: rotate(360deg);
                        }
                    }

                    .animate-spin {
                        animation: spin 1s linear infinite;
                    }
                </style>

                @endif
            </div>
        </div>

    </div>
</div>
