<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClaimController extends Controller
{
    // แสดงฟอร์มยื่นเคลม
    public function showForm()
    {
        return view('claim-form');
    }

    // จัดการการส่งฟอร์ม
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits_between:10,15',
            'problem_description' => 'required|string|max:1000',
            'supporting_documents' => 'required|file|mimes:pdf,jpeg,png|max:2048',
        ]);

        // จัดการไฟล์แนบ
        $documentPath = $request->file('supporting_documents')->store('claims');

        // บันทึกข้อมูลลงฐานข้อมูล
        Claim::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'problem_description' => $request->input('problem_description'),
            'document_path' => $documentPath,
        ]);

        return redirect()->back()->with('success', 'การยื่นเคลมเสร็จสมบูรณ์');
    }
}