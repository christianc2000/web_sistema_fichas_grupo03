@extends('app')

@section('title')
    CREAR USUARIOS
@stop

@section('content')
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="ci" id="ci" placeholder="CI"
                                    required>
                                <label for="floatingInput">CI</label>
                                <div id="ciHelp" class="form-text">
                                    @error('ci')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="NOMBRE" required>
                                <label for="floatingInput">Nombre</label>
                                <div id="nameHelp" class="form-text">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="lastname" id="lastname"
                                    placeholder="APELLIDO" required>
                                <label for="floatingInput">Apellido</label>
                                <div id="lastnameHelp" class="form-text">
                                    @error('lastname')
                                        <div class="alert alert-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="CORREO" required>
                                <label for="floatingInput">Correo</label>
                                <div id="emailHelp" class="form-text">
                                    @error('email')
                                        <div class="alert alert-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="number_phone" id="number_phone"
                                    placeholder="NÚMERO DE CELULAR" required>
                                <label for="floatingInput">Número de celular</label>
                                <div id="number_phoneHelp" class="form-text">
                                    @error('number_phone')
                                        <div class="alert alert-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="gender" name="gender"
                                    aria-label="Floating label select example" required>
                                    <option value="M" selected>Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                                <label for="floatingSelect">Sexo</label>
                                <div id="genderHelp" class="form-text">
                                    @error('gender')
                                        <div class="alert alert-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="marital_status" name="marital_status"
                                    aria-label="Floating label select example" required>
                                    <option value="SOLTERO/A" selected>Soltero/a</option>
                                    <option value="CASADO/A">Casado/a</option>
                                    <option value="VIUDO/A">Viudo/a</option>
                                    <option value="DIVORCIADO/A">Divorciado/a</option>
                                    <option value="OTRO">Otro</option>
                                </select>
                                <label for="floatingSelect">Estado Civil</label>
                                <div id="marital_statusHelp" class="form-text">
                                    @error('marital_status')
                                        <div class="alert alert-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="birth_date" id="birth_date"
                                    placeholder="FECHA DE NACIMIENTO" required>
                                <label for="floatingInput">Fecha de Nacimiento</label>
                                <div id="birthdateHelp" class="form-text">
                                    @error('birth_date')
                                        <div class="alert alert-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="current_residence"
                                    id="current_residence" placeholder="RESIDENCIA" required>
                                <label for="floatingInput">Residencia</label>
                                <div id="current_residenceHelp" class="form-text">
                                    @error('current_residence')
                                        <div class="alert alert-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Contraseña" required>
                                <label for="floatingPassword">Contraseña</label>
                                @error('password')
                                    <div class="alert alert-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="registration_date"
                                    id="registration_date" placeholder="REGISTRO" required>
                                <label for="floatingInput">Registro</label>
                                <div id="registrationdateHelp" class="form-text">
                                    @error('registration_date')
                                        <div class="alert alert-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input name="password_confirmation" type="password" class="form-control"
                                    id="password_confirmation" placeholder="Confirmación de Contraseña" required>
                                <label for="floatingPassword">Confirmación de Contraseña</label>

                                <span id="password_match_message" style="display: none;"></span>
                                @error('password_confirmation')
                                    <div class="alert alert-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" name="photo" id="photo"
                                    placeholder="Foto" accept=".jpeg, .jpg, .png">
                                <label for="floatingInput">Foto</label>
                                <div id="registrationdateHelp" class="form-text">
                                    @error('photo')
                                        <div class="alert alert-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <select class="form-select tipos" id="type" name="type"
                                    aria-label="Floating label select example">
                                    <option value="A" selected>Administrador</option>
                                    <option value="D">Doctor/a</option>
                                    <option value="E">Enfermero/a</option>
                                    <option value="P">Paciente</option>
                                </select>
                                <label for="floatingSelect">Estado Tipo</label>

                                <div id="typeHelp" class="form-text">
                                    @error('type')
                                        <div class="alert alert-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="mb-3">
                                <div id="imagePreview"
                                    style="display: flex; justify-content: center; align-items: center; width: 300px; height: 300px; border: 1px solid #ccc; background-color: #DAFFFB;">
                                    <img id="preview" src="#" alt="Vista previa"
                                        style="display: none; max-width: 300px; max-height: 300px;">
                                    <span id="noImageText">Imagen no seleccionada</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                        </div>
                    </div>

                    <div id="doctorForm" style="display:none;">
                        <div class="mb-3" style="justify-content: center">
                            <label class="form-label">DATOS DOCTOR</label>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input type="file" class="form-control" name="cv" id="cv"
                                        placeholder="Curriculum Vitae" accept="application/pdf">
                                    <label for="floatingInput">Curriculum Vitae</label>
                                    <div id="cvHelp" class="form-text">
                                        @error('cv')
                                            <div class="alert alert-danger form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="speciality" id="speciality"
                                        placeholder="Especialidades">
                                    <label for="floatingInput">Especialidades</label>

                                    <div id="specialityHelp" class="form-text">
                                        @error('speciality')
                                            <div class="alert alert-danger form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="nurseForm" style="display:none;">
                        <div class="mb-3" style="justify-content: center">
                            <label class="form-label">DATOS ENFERMERA</label>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input type="file" class="form-control" name="cve" id="cve"
                                        placeholder="Curriculum Vitae" accept="application/pdf">
                                    <label for="floatingInput">Curriculum Vitae</label>
                                    <div id="cveHelp" class="form-text">
                                        @error('cve')
                                            <div class="alert alert-danger form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="function" id="function"
                                        placeholder="Funciones">
                                    <label for="floatingInput">Funciones</label>

                                    <div id="functionHelp" class="form-text">
                                        @error('function')
                                            <div class="alert alert-danger form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="patientForm" style="display:none;">
                        <div class="mb-3" style="justify-content: center">
                            <label class="form-label">DATOS PACIENTE</label>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="ocuppation" id="ocuppation"
                                        placeholder="Ocupación">
                                    <label for="floatingInput">Ocupación</label>
                                    <div id="ocuppationHelp" class="form-text">
                                        @error('ocuppation')
                                            <div class="alert alert-danger form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="children" id="children"
                                        placeholder="Hijos">
                                    <label for="floatingInput">Hijos</label>

                                    <div id="childrenHelp" class="form-text">
                                        @error('children')
                                            <div class="alert alert-danger form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-warning w-100 mb-5"
                            style="background-color: #fe5000">
                            <span class="indicator-label">Crear Usuario</span>
                            <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $("#password_confirmation").on("keyup", function() {
                const password = $("#password").val();
                const passwordConfirmation = $(this).val();
                const messageSpan = $("#password_match_message");

                if (password === passwordConfirmation) {
                    messageSpan.text("Las contraseñas coinciden").css("color", "green").show();
                } else {
                    messageSpan.text("Las contraseñas no coinciden").css("color", "red").show();
                }
            });
            // Función para mostrar el formulario correspondiente al tipo seleccionado
            function showFormBasedOnType() {
                console.log("primera vez inicializado");
                $("#adminForm").hide();
                $("#doctorForm").hide();
                $("#nurseForm").hide();
                $("#patientForm").hide();

                var selectedType = $(".tipos").val();
                console.log(selectedType);
                if (selectedType === "A") {
                    $("#adminForm").show();
                } else if (selectedType === "D") {
                    $("#doctorForm").show();
                } else if (selectedType === "E") {
                    $("#nurseForm").show();
                } else if (selectedType === "P") {
                    $("#patientForm").show();
                }
            }

            // Mostrar el formulario correspondiente cuando cambia el select
            $(".tipos").change(function() {
                console.log("cambio de option: ", $(this))
                showFormBasedOnType();
            });

            // Mostrar el formulario inicial al cargar la página
            showFormBasedOnType();

            //*******************************************************************
            // Función para mostrar la vista previa de la imagen seleccionada
            const inputPhoto = document.getElementById('photo');
            const previewImage = document.getElementById('preview');
            const noImageText = document.getElementById('noImageText');

            inputPhoto.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        previewImage.style.display = 'block';
                        previewImage.src = event.target.result;
                        noImageText.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewImage.style.display = 'none';
                    noImageText.style.display = 'block';
                }
            });
        });
    </script>

@endsection
