<div class="tile">
    <form action="{{ route('update.site.settings') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <h3 class="tile-title">Site Logo</h3>
        <hr>
        <div class="tile-body">
            <div class="row">
                <div class="col-3">
                    @if (isset($settings) && $settings -> logo != null)
                        <img src="{{ $settings -> logo }}" id="logoImg"
                             style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="logoImg"
                             style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label class="control-label">Site Logo</label>
                        <input class="form-control" type="file" name="site_logo" id="site_logo"
                               onchange="$('#logoImg').attr('src', window.URL.createObjectURL(this.files[0]) )"/>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    @if (isset($settings) && $settings -> favicon != null)
                        <img src="{{ $settings -> favicon }}" id="faviconImg"
                             style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="faviconImg"
                             style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label class="control-label">Site Favicon</label>
                        <input class="form-control" type="file" name="site_favicon" id="site_favicon"
                               onchange="$('#faviconImg').attr('src', window.URL.createObjectURL(this.files[0]) )"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-success"><i
                            class="fa fa-fw fa-lg fa-check-circle"></i>Update
                        Settings
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
