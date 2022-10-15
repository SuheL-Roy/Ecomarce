
<div class="modal fade" id="fileManagerModal" tabindex="-1" aria-labelledby="fileManagerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileManagerModalLabel">File Manager</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-grid">
                                    <a href="javascript:;" class="">+ Add File</a>
                                    <input type="file" accept=".jpg, .jpeg, .png" name="fm_file" class="fm_file_importer btn btn-light">
                                </div>
                                <h5 class="my-3">My Drive</h5>
                                <div class="fm-menu">
                                    <div class="list-group list-group-flush">
                                        <a href="javascript:;" class="list-group-item py-1"><i class="icon-folder icons"></i><span> All Files</span></a>
                                        <a href="javascript:;" class="list-group-item py-1"><i class="icon-folder-alt icons"></i><span> Recents</span></a>
                                        <a href="javascript:;" class="list-group-item py-1"><i class="icon-camera icons"></i><span> Important</span></a>
                                        <a href="javascript:;" class="list-group-item py-1"><i class="icon-event icons"></i><span> Documents</span></a>
                                        <a href="javascript:;" class="list-group-item py-1"><i class="icon-picture icons"></i><span> Images</span></a>
                                        <a href="javascript:;" class="list-group-item py-1"><i class="icon-camrecorder icons"></i><span> Videos</span></a>
                                        <a href="javascript:;" class="list-group-item py-1"><i class="icon-trash icons"></i><span> Deleted Files</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card">

                            <div class="card-body">
                                {{-- <ul class="fm_image_list">
                                    @for ($i=1;$i<=18;$i++)                                 
                                    <li>
                                        <div class="image_body">
                                            <input type="checkbox" class="form-control fm_checkbox">
                                            <div class="controls">
                                                <i class="icon-options-vertical icons"></i>
                                                <ul>
                                                    <li><a href="#"><i class="icon-magnifier icons"></i>View</a></li>
                                                    <li><a href=""><i class="icon-trash icons"></i>Delete</a></li>
                                                </ul>

                                            </div>
                                            <img src="/dummy_products/{{$i}}.jpg" alt="" srcset="">
                                        </div>
                                    </li>
                                    @endfor
                                </ul> --}}
                                <ul class="fm_image_list">
                                    @foreach (App\Models\Image::latest()->get() as $item)
                                        <li>
                                            <div class="image_body">
                                                <input type="checkbox" data-name="{{ $item->name }}" value="{{ $item->id }}" class="form-control fm_checkbox">
                                                <div class="controls">
                                                    <i class="icon-options-vertical icons"></i>
                                                    <ul>
                                                        <li><a href="#"><i class="icon-magnifier icons"></i> View</a></li>
                                                        {{-- <li><a href="{{ route('admin_fm_delete_file',$item->id) }}" class="delete_btn"><i class="icon-trash icons"></i> Delete</a></li> --}}
                                                        <li><a href="" class="delete_btn"><i class="icon-trash icons"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                                <img src="/{{ $item->name }}" alt="product image">
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="#" id="fm_confirm_btn" class="btn btn-primary">Select</a>
            </div>
        </div>
    </div>
</div>