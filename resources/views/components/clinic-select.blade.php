<div class="w-full max-w-xs ml-5">
    <label class="block text-sm font-medium text-gray-700 mb-2">Select Clinic</label>
    <select id="clinic-select" name="clinicname" class="mt-2 block w-full p-2 border rounded" required>
        <option value="" disabled selected>Select a clinic</option>
        @foreach($clinics as $clinic)
            <option value="{{ $clinic->id }}" 
                data-details='{{ json_encode([
                    "name" => $clinic->name, 
                    "email" => $clinic->email, 
                    "address" => $clinic->address, 
                    "Contact" => $clinic->Contact, 
                    "clinic_description" => $clinic->clinic_description, 
                    "pricing_deworming" => $clinic->pricing_deworming, 
                    "pricing_vaccinated" => $clinic->pricing_vaccinated, 
                    "pricing_consultation" => $clinic->pricing_consultation, 
                    "pricing_petgrooming" => $clinic->pricing_petgrooming
                ]) }}'>
                {{ $clinic->clinicname }}
            </option>
        @endforeach
    </select>
    
</div>