@extends('layouts.application')
@section('halaman', 'Percakapan Langsung')
@section('menu', 'Percakapan Langsung')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12 table-responsive">
            <input type="text" id="message" placeholder="Type a message..." />
            <button onclick="sendTawktoMessage()">Send</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        function sendTawktoMessage() {
            var message = document.getElementById('message').value;

            fetch('/basis_pengetahuan/send-tawkto-message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    conversation_id: 'CONVERSATION_ID', // Ganti dengan ID percakapan yang sesuai
                    message: message,
                }),
            })
            .then(response => response.json())
            .then(data => {
                // Tambahkan logika tampilan atau respons yang sesuai
            });
        }
    </script>
@endpush
