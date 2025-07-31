# Dokumen Terkait Feature Implementation

## Overview
Changed the "Dokumen Terkait" field from a file upload to a search-based relationship system that allows users to link existing reports from the database.

## Changes Made

### 1. Database Schema
- **Created migration**: `2025_07_31_064044_create_report_relationships_table.php`
- **New table**: `report_relationships` with columns:
  - `id` (primary key)
  - `report_id` (foreign key to reports table)
  - `related_report_id` (foreign key to reports table)
  - `timestamps`
  - Unique constraint on (`report_id`, `related_report_id`)

### 2. Model Updates
- **Updated `Report.php` model**:
  - Removed `dokumen_terkait` from fillable array
  - Added `relatedReports()` relationship method
  - Added `reportsRelatedTo()` reverse relationship method

### 3. Controller Updates
- **Updated `ReportController.php`**:
  - Removed file upload handling for `dokumen_terkait`
  - Added `searchReports()` method for AJAX search functionality
  - Updated `store()` method to handle related reports relationship
  - Updated `show()` method to eager load related reports

### 4. Route Updates
- **Added new route** in `web.php`:
  - `GET /search-reports` for AJAX search functionality

### 5. Frontend Updates
- **Updated `tambah.blade.php`**:
  - Replaced file upload input with search interface
  - Added search input field with real-time search
  - Added results display area with clickable items
  - Added selected reports display with remove functionality
  - Added hidden input to store selected report IDs
  - Enhanced JavaScript with:
    - Real-time search with debouncing (300ms)
    - Search results display and selection
    - Tag-style display of selected reports
    - Remove functionality for selected reports

- **Updated `reports/show.blade.php`**:
  - Added display section for related reports
  - Shows related reports as clickable links
  - Displays report title, type, and number for each related report

## Search Functionality
The search feature searches across multiple fields:
- `judul` (title)
- `nomor` (number)
- `tahun` (year)
- `jenis` (type)
- `tipe_dokumen` (document type)

## How It Works

### For Users Adding Documents:
1. In the "Dokumen Terkait" field, users can type to search existing documents
2. Search results appear in real-time showing matching documents
3. Users can click on any result to add it as a related document
4. Selected documents appear as removable tags
5. When the form is submitted, relationships are stored in the database

### For Users Viewing Documents:
1. Related documents appear in the detail view
2. Each related document is a clickable link
3. Clicking takes users to the related document's detail page

## Benefits
- **Better Data Integrity**: Links to existing documents instead of duplicate files
- **Improved Navigation**: Easy access to related documents
- **Search Functionality**: Users can quickly find relevant documents
- **Space Efficiency**: No duplicate file storage
- **Relationship Tracking**: Bidirectional relationships between documents

## Testing
The application is now ready for testing. Users can:
1. Create new documents with related document links
2. Search and select existing documents as related
3. View related documents in the detail page
4. Navigate between related documents seamlessly
