<?php
/**
 * Click-to-reveal support email with a lightweight human check.
 *
 * Keeps the raw email out of rendered HTML and mailto links until a visitor
 * solves the on-page challenge.
 */

if (!function_exists('kbtRenderProtectedEmailAssets')) {
    function kbtRenderProtectedEmailAssets() {
        static $rendered = false;
        if ($rendered) { return; }
        $rendered = true;
?>
<style>
.kbt-protected-email{display:inline-flex;align-items:center;gap:.45rem;max-width:100%}.kbt-protected-email-button{display:inline-flex;align-items:center;justify-content:center;gap:.4rem;min-height:36px;padding:.45rem .75rem;border:1px solid var(--border-color,#cbd5e1);border-radius:8px;background:var(--surface,#fff);color:var(--link-color,#1d4ed8);font:inherit;font-size:.92rem;font-weight:700;cursor:pointer;line-height:1.2}.kbt-protected-email-button:hover,.kbt-protected-email-button:focus-visible{border-color:var(--primary-color,#2563eb);box-shadow:0 0 0 3px rgba(37,99,235,.14);outline:0}.kbt-protected-email-lock{font-size:.95em}.kbt-protected-email-output a{font-weight:700;overflow-wrap:anywhere}.kbt-email-challenge-backdrop{position:fixed;inset:0;z-index:100000;display:flex;align-items:center;justify-content:center;padding:1rem;background:rgba(15,23,42,.62)}.kbt-email-challenge-backdrop[hidden]{display:none}.kbt-email-challenge-dialog{width:min(420px,100%);border:1px solid var(--border-color,#dbe3ec);border-radius:12px;background:var(--surface,#fff);color:var(--text-color,#0f172a);box-shadow:0 24px 70px rgba(15,23,42,.28);padding:1.1rem}.kbt-email-challenge-dialog h2{margin:0 0 .45rem;font-size:1.15rem;color:var(--text-color,#0f172a)}.kbt-email-challenge-dialog p{margin:0 0 .85rem;color:var(--text-muted,#475569);font-size:.95rem}.kbt-email-challenge-form{display:grid;gap:.7rem}.kbt-email-challenge-form label{font-weight:700}.kbt-email-challenge-form input{width:100%;min-height:42px;border:1px solid var(--border-color,#cbd5e1);border-radius:8px;padding:.55rem .7rem;font:inherit}.kbt-email-challenge-actions{display:flex;justify-content:flex-end;gap:.55rem;flex-wrap:wrap;margin-top:.25rem}.kbt-email-challenge-actions button{min-height:38px;border-radius:8px;border:1px solid var(--border-color,#cbd5e1);padding:.45rem .75rem;font:inherit;font-weight:700;cursor:pointer}.kbt-email-challenge-submit{background:var(--primary-color,#2563eb);border-color:var(--primary-color,#2563eb)!important;color:#fff}.kbt-email-challenge-error{min-height:1.2em;color:#b91c1c;font-weight:700;font-size:.9rem}html.dark-theme .kbt-protected-email-button,[data-theme="dark"] .kbt-protected-email-button,html.dark-theme .kbt-email-challenge-dialog,[data-theme="dark"] .kbt-email-challenge-dialog{background:var(--surface,#1e293b);color:var(--text-color,#f8fafc);border-color:var(--border-color,#334155)}html.dark-theme .kbt-email-challenge-dialog p,[data-theme="dark"] .kbt-email-challenge-dialog p{color:#cbd5e1}
</style>
<script>
(function(){
  if (window.KBTProtectedEmailReady) return;
  window.KBTProtectedEmailReady = true;

  var activeTarget = null;
  var challengeAnswer = 0;
  var lastFocus = null;

  function decodeToken(token) {
    try { return window.atob(token || ''); } catch (err) { return ''; }
  }

  function rand(min, max) {
    if (window.crypto && window.crypto.getRandomValues) {
      var data = new Uint32Array(1);
      window.crypto.getRandomValues(data);
      return min + (data[0] % (max - min + 1));
    }
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  function getModal() {
    var modal = document.getElementById('kbt-email-challenge');
    if (modal) return modal;

    modal = document.createElement('div');
    modal.id = 'kbt-email-challenge';
    modal.className = 'kbt-email-challenge-backdrop';
    modal.hidden = true;
    modal.innerHTML = '<div class="kbt-email-challenge-dialog" role="dialog" aria-modal="true" aria-labelledby="kbt-email-challenge-title"><h2 id="kbt-email-challenge-title">Human check</h2><p>Solve this quick check to reveal the support email.</p><form class="kbt-email-challenge-form"><label for="kbt-email-answer">What is <span data-kbt-email-question></span>?</label><input id="kbt-email-answer" type="number" inputmode="numeric" autocomplete="off" required><div class="kbt-email-challenge-error" data-kbt-email-error aria-live="polite"></div><div class="kbt-email-challenge-actions"><button type="button" data-kbt-email-cancel>Cancel</button><button class="kbt-email-challenge-submit" type="submit">Reveal email</button></div></form></div>';
    document.body.appendChild(modal);

    modal.addEventListener('click', function(event) {
      if (event.target === modal || event.target.closest('[data-kbt-email-cancel]')) {
        closeModal();
      }
    });
    modal.querySelector('form').addEventListener('submit', function(event) {
      event.preventDefault();
      var input = modal.querySelector('#kbt-email-answer');
      var error = modal.querySelector('[data-kbt-email-error]');
      if (!activeTarget || Number(input.value) !== challengeAnswer) {
        error.textContent = 'Incorrect answer. Try again.';
        input.select();
        return;
      }
      revealEmail(activeTarget);
      closeModal();
    });
    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape' && !modal.hidden) closeModal();
    });
    return modal;
  }

  function openModal(target) {
    activeTarget = target;
    lastFocus = document.activeElement;
    var a = rand(2, 9);
    var b = rand(2, 9);
    challengeAnswer = a + b;
    var modal = getModal();
    modal.querySelector('[data-kbt-email-question]').textContent = a + ' + ' + b;
    modal.querySelector('[data-kbt-email-error]').textContent = '';
    modal.querySelector('#kbt-email-answer').value = '';
    modal.hidden = false;
    window.setTimeout(function(){ modal.querySelector('#kbt-email-answer').focus(); }, 20);
  }

  function closeModal() {
    var modal = getModal();
    modal.hidden = true;
    activeTarget = null;
    if (lastFocus && typeof lastFocus.focus === 'function' && !lastFocus.hidden) lastFocus.focus();
  }

  function revealEmail(target) {
    var token = target.getAttribute('data-kbt-email-token');
    var email = decodeToken(token);
    if (!email || email.indexOf('@') === -1) return;

    var output = target.querySelector('[data-kbt-email-output]');
    var trigger = target.querySelector('[data-kbt-email-trigger]');
    var link = document.createElement('a');
    link.href = 'mailto:' + email;
    link.textContent = email;
    link.rel = 'nofollow';
    output.textContent = '';
    output.appendChild(link);
    output.hidden = false;
    if (trigger) trigger.hidden = true;
    link.focus();
  }

  document.addEventListener('click', function(event) {
    var trigger = event.target.closest('[data-kbt-email-trigger]');
    if (!trigger) return;
    var target = trigger.closest('[data-kbt-protected-email]');
    if (!target) return;
    event.preventDefault();
    openModal(target);
  });
})();
</script>
<?php
    }
}

if (!function_exists('kbtRenderProtectedEmail')) {
    function kbtRenderProtectedEmail($options = []) {
        global $siteEmail;

        $email = isset($options['email']) ? (string) $options['email'] : (string) ($siteEmail ?? '');
        if ($email === '') { return ''; }

        $label = isset($options['label']) ? (string) $options['label'] : 'Show support email';
        $class = isset($options['class']) ? (string) $options['class'] : '';
        $token = base64_encode($email);

        ob_start();
?>
<span class="kbt-protected-email <?php echo htmlspecialchars($class, ENT_QUOTES, 'UTF-8'); ?>" data-kbt-protected-email data-kbt-email-token="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>">
    <button type="button" class="kbt-protected-email-button" data-kbt-email-trigger><span class="kbt-protected-email-lock" aria-hidden="true">@</span><span><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></span></button>
    <span class="kbt-protected-email-output" data-kbt-email-output hidden></span>
</span>
<?php
        return trim(ob_get_clean());
    }
}
