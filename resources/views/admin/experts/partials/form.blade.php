<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $expert->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Location</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $expert->location ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Skills</label>
    <select name="skills[]" class="form-select" multiple>
        @foreach($skills as $skill)
            <option value="{{ $skill->id }}" 
                @if(isset($expert) && $expert->skills->contains($skill->id)) selected @endif>
                {{ $skill->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Certificate (PDF)</label>
    <input type="file" name="certificate" class="form-control">
    @if(isset($expert) && $expert->certificate)
        <small><a href="{{ asset('storage/' . $expert->certificate) }}" target="_blank">Current Certificate</a></small>
    @endif
</div>

<div class="mb-3">
    <label>Photo</label>
    <input type="file" name="photo" class="form-control">
    @if(isset($expert) && $expert->photo)
        <img src="{{ asset('storage/' . $expert->photo) }}" alt="Photo" width="50" class="mt-2">
    @endif
</div>
