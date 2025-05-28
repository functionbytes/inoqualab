
                            <div class="card-body chat-box-area dz-scroll" id="chartBox">
                                @foreach($tracings as $tracing)
                                    @if($user->id == $tracing->user_id)
                                        <div class="media mb-4 justify-content-end align-items-end">
                                            <div class="message-sent">
                                                <p class="mb-1">{{ $tracing->observation }}</p>
                                                @if ($tracing->documents()!=null)
                                                    <div class="read-content-attachment ">
                                                        <a  target="_blank" href="/pages/tracings/{{ $tracing->documents()->filename }}">
                                                            <h6>
                                                                <i class="fa fa-download mb-2"></i>
                                                                Archivos adjuntos
                                                            </h6>
                                                        </a>
                                                    </div>
                                                @endif
                                                <span class="fs-12">{{ humanize_view($tracing->created_at) }}</span>
                                            </div>
                                            <div class="image-bx ml-sm-4 ml-2 mb-4">
                                                <img src="/managers/images/contacts/example.png" alt="" class="rounded-circle img-1">
                                                <span class="active"></span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="media mb-4  justify-content-start align-items-start">
                                            <div class="image-bx mr-sm-4 mr-2">
                                                <img src="/managers/images/contacts/example.png" alt="" class="rounded-circle img-1">
                                                <span class="active"></span>
                                            </div>
                                            <div class="message-received">
                                                <p class="mb-1">{{ $tracing->observation }}</p>
                                                @if ($tracing->documents()!=null)
                                                    <div class="read-content-attachment ">
                                                        <a  target="_blank" href="/pages/tracings/{{ $tracing->documents()->filename }}">
                                                            <h6>
                                                                <i class="fa fa-download mb-2"></i>
                                                                Archivos adjuntos
                                                            </h6>
                                                        </a>
                                                    </div>
                                                @endif
                                                <span class="fs-12">{{ humanize_view($tracing->created_at) }}</span>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                            </div>
