<section class="section bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-title">{{ $title }}</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 mb-4 mb-lg-0">
          <form action="#">
            <input type="text" class="form-control mb-3" wire:model="name" placeholder="Nom">
            <input type="text" class="form-control mb-3" wire:model="lname" placeholder="Prénoms">
            <input type="text" class="form-control mb-3" wire:model="birthdate" placeholder="Date de naissance">
            <input type="email" class="form-control mb-3" wire:model="nativeLanguage" placeholder="Langue maternelle">
            <input type="email" class="form-control mb-3" wire:model="useLanguage" placeholder="Langue d'usage">
            <input type="email" class="form-control mb-3" wire:model="nativeCountry" placeholder="Pays de naissance">
            <input type="email" class="form-control mb-3" wire:model="nativeState" placeholder="Province/Etat de naissance">
            <input type="email" class="form-control mb-3" wire:model="nativeCity" placeholder="Ville de naissance">
            
            <button type="submit" value="send" class="btn btn-primary">Enregistrer</button>
            <button type="submit" value="send" class="btn btn-primary">Annuler</button>
            <button type="submit" value="send" class="btn btn-primary">Suivant</button>
          </form>
        </div>

      </div>
    </div>
  </section>
