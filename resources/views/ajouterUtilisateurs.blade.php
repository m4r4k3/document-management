@extends('layouts.master')
@section('title')
    Utilisateurs
@endsection

@section('css')
    {{ asset('css/ajouterUtilisateur.css') }}
@endsection
@section('section')
    <div class="container">
        <x-panelnav></x-panelnav>
        <div class="sub-container">
            <div class="title-sub">Ajouter Un Utilisateur</div>
            <div class="sub-sub-container">
                <form class="ajouter-form" action="{{route("createUser")}}" method="POST">
                  @csrf
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" id="nom" name="nom" required>
                      </div>
                
                      <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" id="prenom" name="prenom" required>
                      </div>
                
                      <div class="form-group">
                        <label for="cin">CIN:</label>
                        <input type="text" id="cin" name="cin" required>
                      </div>
                
                      <div class="form-group">
                        <label for="fonction">Fonction:</label>
                        <select name="role">
                          <option disabled selected>Fonction</option>
                          <option value="1"  >Admin</option>
                          <option value="2"  >Operateur</option>
                        </select>
                        </div>
                
                      <div class="form-group">
                        <label for="pseudo">Pseudo:</label>
                        <input type="text" id="pseudo" name="user" required>
                      </div>
                
                      <div class="form-group">
                        <label for="password">Mot de passe:</label>
                        <input type="password" id="password" name="password" required>
                      </div>
                
                      <div class="form-group">
                        <label for="confirm_password">Confirmer le mot de passe:</label>
                        <input type="password" id="confirm_password" name="password_confirmation" required>
                      </div>
                
                      <button type="submit" class="submit">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
@endsection
