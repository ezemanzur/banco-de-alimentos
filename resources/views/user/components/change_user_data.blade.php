    <!-- Persona responsable -->
    <div class="col-md-6">
        @php
            if($user->rol == 'giver'){
                $person_title = "Persona responsable";
            }
            else {
                $person_title = "Datos personales";
            }
        @endphp

        <h3 class="py-3">{{ $person_title }}</h3>
        <!-- Nombre y apellido -->
        <div class="form-group row">
            <div class="col-md-12">
                <label for="name" class="req-tooltip">Nombre y apellido @include('components.required_tool')</label>

                <input id="name" type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name" placeholder="John Smith"
                    value="{{ $user->name }}" required
                    autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- DNI -->
        <div class="form-group row">
            <div class="col-md-12">
                <label for="dni" class="req-tooltip">DNI (Solo números) @include('components.required_tool')</label>

                <input id="dni" type="number" min="0"
                    class="form-control @error('dni') is-invalid @enderror"
                    name="dni" placeholder="ej: 381234567"
                    value="{{ $user->dni }}" required
                    autocomplete="dni" autofocus>

                @error('dni')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Número de teléfono -->
        <div class="form-group row">
            <div class="col-md-12">
                <label for="phone" class="req-tooltip">Número de teléfono (Solo números) @include('components.required_tool')</label>

                <input id="phone" type="number" min="0"
                    class="form-control @error('phone') is-invalid @enderror"
                    name="phone" placeholder="ej: 2214567890"
                    value="{{ $user->phone }}" required
                    autocomplete="phone" autofocus>

                @error('phone')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="form-group row">
            <div class="col-md-12">
                <label for="email" class="req-tooltip">Email @include('components.required_tool')</label>

                <input id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email" placeholder="johnsmith@dominio.com"
                    value="{{ $user->email }}" required
                    autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>