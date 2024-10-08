<?php
    //Clase con los datos de usuario a registrar
    class UserSignUp{
        private Credentials $credentials;
        private string $name;
        private string $lastname;
        private string $email;
        private string $numberphone;
        private DateTime $birthdate;
        private UserGender $gender;
        private UserAddress $address;
            
            function __construct(Credentials $credentials, string $name, string $lastname, string $email, string $numberphone, DateTime $birthdate, UserGender $gender, UserAddress $address) {
                $this->credentials = $credentials;
                $this->name = $name;
                $this->lastname = $lastname;
                $this->email = $email;
                $this->numberphone = $numberphone;
                $this->birthdate = $birthdate;
                $this->gender = $gender;
                $this->address = $address;
            }
            //Metodo para obtener el nombre
            public function getName(): string {
                return $this->name;
            }
            //Metodo para obtener el apellido
            public function getLastname(): string {
                return $this->lastname;
            }
            //Metodo para obtener el email
            public function getEmail(): string {
                return $this->email;
            }
            //Metodo para obtener el número de teléfono
            public function getNumberPhone(): string {
                return $this->numberphone;
            }
            //Metodo para obtener la fecha de nacimiento
            public function getBirthdate(): DateTime {
                return $this->birthdate;
            }
            //Metodo para obtener el género
            public function getGender(): UserGender {
                return $this->gender;
            }
            //Metodo para obtener la dirección
            public function getAddress(): UserAddress {
                return $this->address;
            }
            //Metodo para obtener el país
            public function getCountry(): UserCountry {
                return $this->address->getCountry();
            }
            //Metodo para obtener la provincia
            public function getState(): UserProvince {
                return $this->address->getProvince();
            }
            //Metodo para obtener la localidad
            public function getLocality(): UserLocality {
                return $this->address->getLocality();
            }
            //metodo para obetener las credenciales
            public function getCredentials(): Credentials {
                return $this->credentials;
            }
    }
?>