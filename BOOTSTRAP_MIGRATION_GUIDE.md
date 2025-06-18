# Bootstrap Migration Guide

## Current Situation

-   **Existing pages**: Use Bootstrap 4.6.1 (legacy)
-   **New layout**: Uses Bootstrap 5.3.6 (modern)
-   **Goal**: Avoid conflicts between versions

## Solution: Isolated Bootstrap 5.3.6 Layout

### 1. New Layout (`master.blade.php`)

-   ✅ Uses **Bootstrap 5.3.6 ONLY**
-   ✅ Has compatibility layer to prevent conflicts
-   ✅ Uses modern syntax: `data-bs-toggle`, `data-bs-target`, `data-bs-dismiss`
-   ✅ Uses Bootstrap 5.3.6 Modal API

### 2. Existing Pages (Keep Bootstrap 4.6.1)

-   ✅ Continue using Bootstrap 4.6.1
-   ✅ Keep existing functionality intact
-   ✅ No changes needed to existing code

## How to Use

### For New Pages (Use Bootstrap 5.3.6)

```php
@extends('sitelayout.master')

@section('content')
    {{-- Your content here --}}
    {{-- Use Bootstrap 5.3.6 syntax --}}
    <button data-bs-toggle="modal" data-bs-target="#myModal">Open Modal</button>
@endsection
```

### For Existing Pages (Keep Bootstrap 4.6.1)

```php
@extends('front.layout') // or layoutforform

@section('content')
    {{-- Your content here --}}
    {{-- Use Bootstrap 4.6.1 syntax --}}
    <button data-toggle="modal" data-target="#myModal">Open Modal</button>
@endsection
```

## Compatibility Features

### CSS Compatibility

-   Z-index overrides to prevent modal conflicts
-   Bootstrap 5.3.6 component styles enforced
-   Prevents Bootstrap 4.6.1 from interfering

### JavaScript Compatibility

-   jQuery modal method override
-   Bootstrap 5.3.6 Modal API integration
-   Graceful fallback for mixed usage

## Migration Strategy

### Phase 1: ✅ Complete

-   Create isolated Bootstrap 5.3.6 layout
-   Add compatibility layers
-   Test modal functionality

### Phase 2: Future (Optional)

-   Gradually migrate existing pages to Bootstrap 5.3.6
-   Update syntax: `data-toggle` → `data-bs-toggle`
-   Update JavaScript: `$("#modal").modal()` → `bootstrap.Modal`

### Phase 3: Future (Optional)

-   Remove Bootstrap 4.6.1 completely
-   Standardize on Bootstrap 5.3.6 across all pages

## Testing Checklist

-   [ ] Sign In modal opens correctly
-   [ ] Forgot Password modal opens correctly
-   [ ] Modals don't overlap
-   [ ] Close buttons work properly
-   [ ] Existing pages still work with Bootstrap 4.6.1
-   [ ] No console errors

## Important Notes

1. **Don't mix versions** on the same page
2. **Use appropriate layout** for each page
3. **Test thoroughly** before deploying
4. **Document any issues** for future reference

## Troubleshooting

### Modal Overlapping Issue

-   Ensure only one Bootstrap version is loaded per page
-   Check for conflicting CSS z-index values
-   Verify JavaScript compatibility layer is working

### Existing Pages Breaking

-   Ensure they still use Bootstrap 4.6.1 layout
-   Don't remove Bootstrap 4.6.1 from existing pages
-   Test existing functionality after changes

### New Pages Not Working

-   Ensure they extend the correct layout (`sitelayout.master`)
-   Use Bootstrap 5.3.6 syntax
-   Check browser console for errors
