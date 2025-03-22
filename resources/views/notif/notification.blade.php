<div class="list-group list-group-flush fw-normal fs--1">
    <div class="list-group-title border-bottom">NEW</div>
    @foreach ($data as $datas)
        <div class="list-group-item">
            <a class="notification notification-flush notification-unread" href="#!">
                <div class="notification-avatar">
                    <div class="avatar avatar-2xl me-3">
                        <img class="rounded-circle" src="{{ asset('assets/img/team/order.png') }}" alt="" />

                    </div>
                </div>
                <div class="notification-body">
                    <p class="mb-1"><strong>Order</strong> {{$datas->no_reg_order}}</p>
                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>by : {{$datas->fullname}}</span>

                </div>
            </a>
        </div>
    @endforeach

    {{-- <div class="list-group-title border-bottom">EARLIER</div>
    <div class="list-group-item">
        <a class="notification notification-flush" href="#!">
            <div class="notification-avatar">
                <div class="avatar avatar-2xl me-3">
                    <img class="rounded-circle" src="../assets/img/icons/weather-sm.jpg" alt="" />

                </div>
            </div>
            <div class="notification-body">
                <p class="mb-1">The forecast today shows a low of 20&#8451;
                    in California. See today's weather.</p>
                <span class="notification-time"><span class="me-2" role="img"
                        aria-label="Emoji">🌤️</span>1d</span>

            </div>
        </a>

    </div>
    <div class="list-group-item">
        <a class="border-bottom-0 notification-unread  notification notification-flush" href="#!">
            <div class="notification-avatar">
                <div class="avatar avatar-xl me-3">
                    <img class="rounded-circle" src="../assets/img/logos/oxford.png" alt="" />

                </div>
            </div>
            <div class="notification-body">
                <p class="mb-1"><strong>University of Oxford</strong>
                    created an event : "Causal Inference Hilary 2019"</p>
                <span class="notification-time"><span class="me-2" role="img"
                        aria-label="Emoji">✌️</span>1w</span>

            </div>
        </a>

    </div>
    <div class="list-group-item">
        <a class="border-bottom-0 notification notification-flush" href="#!">
            <div class="notification-avatar">
                <div class="avatar avatar-xl me-3">
                    <img class="rounded-circle" src="../assets/img/team/10.jpg" alt="" />

                </div>
            </div>
            <div class="notification-body">
                <p class="mb-1"><strong>James Cameron</strong> invited to
                    join the group: United Nations International Children's Fund
                </p>
                <span class="notification-time"><span class="me-2" role="img"
                        aria-label="Emoji">🙋‍</span>2d</span>

            </div>
        </a>

    </div> --}}
</div>
