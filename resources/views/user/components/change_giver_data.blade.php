    <div class="col-md-6 bl-1">
        <h3 class="py-3">Información Donante</h3>
        <!-- Nombre de la empresa -->
        <div class="form-group row">
            <div class="col-md-12">
                <label for="company_name" class="req-tooltip">Nombre de la
                    empresa @include('components.required_tool')</label>

                <input id="company_name" type="text"
                    class="form-control @error('company_name') is-invalid @enderror"
                    name="company_name" placeholder="Enterprise SRL"
                    value="{{ $giver->first()->company_name }}" required
                    autocomplete="company_name" autofocus>

                @error('company_name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- CUIT -->
        <div class="form-group row">
            <div class="col-md-12">
                <label for="company-cuit"
                    class="req-tooltip">CUIT @include('components.required_tool')</label>

                <input id="company-cuit" type="number" min="0"
                    class="form-control @error('company-cuit') is-invalid @enderror"
                    name="company-cuit" placeholder="ej: 204445559"
                    value="{{ $giver->first()->company_cuit }}" required
                    autocomplete="company-cuit" autofocus>

                @error('company-cuit')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Numero de telefono -->
        <div class="form-group row">
            <div class="col-md-12">
                <label for="company-phone" class="req-tooltip">Número de
                    teléfono @include('components.required_tool')</label>

                <input id="company-phone" type="number" min="0"
                    class="form-control @error('company-phone') is-invalid @enderror"
                    name="company-phone" placeholder="ej: 221444555"
                    value="{{ $giver->first()->company_phone }}" required
                    autocomplete="company-phone" autofocus>

                @error('company-phone')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Dirección -->
        <h4 class="mt-5 py-2">Direccion</h4>
        <!-- Calle y numero -->
        <div class="form-group row">
            <!-- Calle -->
            <div class="col-md-7">
                <label for="address-street" class="req-tooltip">Calle @include('components.required_tool')</label>

                <input id="address-street" type="text"
                    class="form-control @error('address-street') is-invalid @enderror"
                    name="address-street" placeholder="Calle 0"
                    value="{{ $giver->first()->address_street }}" required
                    autocomplete="address-street" autofocus>

                @error('address-street')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- Numero -->
            <div class="col-md-5">
                <label for="address-number" class="req-tooltip">Número @include('components.required_tool')</label>

                <input id="address-number" type="number" min="0"
                    class="form-control @error('address-number') is-invalid @enderror"
                    name="address-number" placeholder="0"
                    value="{{ $giver->first()->address_number }}"
                    required autocomplete="address-number" autofocus>

                @error('address-number')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Piso y depto -->
        <div class="form-group row">
            <!-- Piso -->
            <div class="col-md-5">
                <label for="address-floor">Piso</label>

                <input id="address-floor" type="number" min="0"
                    class="form-control @error('address-floor') is-invalid @enderror"
                    name="address-floor" placeholder="0"
                    value="{{ $giver->first()->address_floor }}"
                    autocomplete="address-floor" autofocus>

                @error('address-floor')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- Depto -->
            <div class="col-md-5">
                <label for="address-apartment">Depto</label>

                <input id="address-apartment" type="text"
                    class="form-control @error('address-apartment') is-invalid @enderror"
                    name="address-apartment" placeholder="0"
                    value="{{ $giver->first()->address_apartment }}"
                    autocomplete="address-apartment" autofocus>

                @error('address-apartment')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Barrio -->
        <div class="form-group row">
            <div class="col-md-6">
                <label for="neighborhood" class="req-tooltip">Barrio @include('components.required_tool')</label>

                <select id="neighborhood" type="text" class="form-control browser-default custom-select @error('neighborhood') is-invalid @enderror" name="neighborhood" value="{{ old('neighborhood') }}" autocomplete="neighborhood" required autofocus>
                    @foreach ($neighborhoods as $n)
                        <option value="{{ $n->neighborhood_id }}"
                            @if($giver->first()->neighborhood_id == $n->neighborhood_id)
                                selected
                            @endif
                        >{{ $n->name }}
                        </option>
                    @endforeach
                </select>

                @error('neighborhood')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>