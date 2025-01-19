<x-claim-theme>
    <div class="container mt-5">
        <h2 class="text-center mb-4">ฟอร์มยื่นเคลมประกัน</h2>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('claims.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="mb-3">
                <label for="name" class="form-label">ชื่อผู้ยื่นเคลม</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="email" class="form-label">อีเมล</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="problem_description" class="form-label">อธิบายปัญหา</label>
                <textarea class="form-control @error('problem_description') is-invalid @enderror" id="problem_description" name="problem_description" rows="4" required>{{ old('problem_description') }}</textarea>
                @error('problem_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="supporting_documents" class="form-label">แนบเอกสารสำคัญ</label>
                <input type="file" class="form-control @error('supporting_documents') is-invalid @enderror" id="supporting_documents" name="supporting_documents" required>
                @error('supporting_documents')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="text-center">
                <button type="submit" class="btn btn-primary">ยื่นเคลม</button>
            </div>
        </form>
    </div>
    </x-claim-theme>
    