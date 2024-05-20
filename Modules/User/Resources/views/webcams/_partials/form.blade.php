@csrf
<div class="row">
    <div class="col-md-6">
      <div class="input-style-1">
        <label><span class="c_red" data-toggle="tooltip" data-placement="bottom" title="Campo Obligatorio">(*)&nbsp;</span>Título</label>
        <input type="text" name="title" value="{{ $webcam->title ?? old('title') }}" class="bg-transparent">
      </div>
    </div>
    <div class="col-md-6">
      <div class="select-style-1">
        <label><span class="c_red" data-toggle="tooltip" data-placement="bottom" title="Campo Obligatorio">(*)&nbsp;</span>Tipo</label>
        <div class="select-position">
          <select name="type">
            @foreach ($types as $key)
              <option value="{{ $key[1] }}" {{ ( $key[1] == $webcamType) ? 'selected' : '' }}> {{ $key[1] }} </option>
            @endforeach 
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="input-style-1">
        <label><span class="c_red" data-toggle="tooltip" data-placement="bottom" title="Campo Obligatorio">(*)&nbsp;</span>URL</label>
        <input type="text" name="url" value="{{ $webcam->url ?? old('url') }}" class="bg-transparent">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-style-1">
        <label>Proveedor</label>
        <input type="text" name="provider" value="{{ $webcam->provider ?? old('provider') }}" class="bg-transparent">
      </div>
    </div>
    <div class="col-md-4">
      <div class="select-style-1">
        <label>Status</label>
        <div class="select-position">
          <select name="status">
            @foreach ($status as $key)
              <option value="{{ $key[0] }}" {{ ( $key[0] == $webcamStatus) ? 'selected' : '' }}> {{ $key[1] }} </option>
            @endforeach 
          </select>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="button-group d-flex justify-content-center flex-wrap">
        <button type="submit" class="main-btn primary-btn btn-hover m-2">Guardar</button>
        <a class="main-btn danger-btn-outline m-2" href="{{ url('/user/webcams') }}">Atrás</a>
      </div>
    </div>
</div>