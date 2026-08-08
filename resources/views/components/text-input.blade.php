@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-slate-200 bg-slate-50 focus:border-primary focus:ring-primary/10 rounded-3xl shadow-sm']) }}>
