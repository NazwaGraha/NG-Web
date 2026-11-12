  <!-- Google Tag Manager / Google Tag (GTM-MFR9ZXF) -->
  <script async src="https://www.googletagmanager.com/gtm.js?id=GTM-MFR9ZXF"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  </script>

@php
  $gaId = $settings['ga_measurement_id'] ?? env('GA_MEASUREMENT_ID', 'G-5GYSVPFZ48');
@endphp

@if(!empty($gaId))
  <!-- Google Analytics 4 (GA4) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
  <script>
    gtag('config', '{{ $gaId }}', {
      send_page_view: true,
      anonymize_ip: true,
      cookie_flags: 'SameSite=None;Secure'
    });
  </script>
@endif

<!-- Universal WhatsApp & Lead Conversion Tracker NazwaGraha -->
<script>
(function() {
  function trackEvent(name, params) {
    if (typeof gtag === 'function') {
      gtag('event', name, params);
    }
    if (window.dataLayer && Array.isArray(window.dataLayer)) {
      window.dataLayer.push(Object.assign({ event: name }, params));
    }
    // Debug log for instant verification in browser console
    if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
      console.log('%c🎯 [NazwaGraha Tracker]', 'background: #f47712; color: #fff; padding: 2px 6px; border-radius: 4px; font-weight: bold;', name, params);
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    // 1. Track all WhatsApp clicks with contextual data
    document.addEventListener('click', function(e) {
      var target = e.target.closest('a');
      if (!target) return;

      var href = target.getAttribute('href') || '';
      if (href.indexOf('wa.me') !== -1 || href.indexOf('whatsapp.com') !== -1) {
        var label = (target.innerText || target.getAttribute('aria-label') || 'WhatsApp CTA').trim().replace(/\s+/g, ' ');
        var closestCard = target.closest('.plan-card, .service-card, .hero-actions, .order-card, .pricing-card, header, footer, .testimonial-card');
        var context = 'general';
        if (closestCard) {
          var titleEl = closestCard.querySelector('h2, h3, h4, .plan-title');
          if (titleEl) context = titleEl.innerText.trim();
        }

        trackEvent('click_whatsapp', {
          event_category: 'contact',
          event_label: label,
          service_context: context,
          page_path: window.location.pathname,
          target_url: href
        });

        trackEvent('generate_lead', {
          method: 'WhatsApp',
          service_context: context,
          page_path: window.location.pathname,
          value: 1,
          currency: 'IDR'
        });
      }
    });

    // 2. Track Order / Inquiry Form Submissions
    var orderForms = document.querySelectorAll('form[action*="inquiry"], #orderForm');
    orderForms.forEach(function(form) {
      form.addEventListener('submit', function() {
        var serviceSelect = form.querySelector('select[name="service_name"], input[name="service_name"]');
        var serviceVal = serviceSelect ? serviceSelect.value : 'General Inquiry';
        var nameInput = form.querySelector('input[name="name"]');
        var waInput = form.querySelector('input[name="whatsapp"]');

        trackEvent('form_submission', {
          event_category: 'lead',
          service_name: serviceVal,
          has_name: !!(nameInput && nameInput.value),
          has_whatsapp: !!(waInput && waInput.value),
          page_path: window.location.pathname
        });

        trackEvent('generate_lead', {
          method: 'Formulir Website',
          service_name: serviceVal,
          page_path: window.location.pathname,
          value: 1,
          currency: 'IDR'
        });
      });
    });
  });
})();
</script>
