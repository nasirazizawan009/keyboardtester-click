<?php
// WhatsApp Sentiment Analyzer tool (standalone)
?>

<div class="kbt-tool kbt-sentiment-tool" id="sentiment-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Analyze conversation</h3>
      <p>Paste chat text to get a quick sentiment estimate. This is a lightweight, browser-based approximation.</p>
      <textarea class="kbt-tool-textarea" id="sentiment-input" rows="8" placeholder="Paste WhatsApp chat text here"></textarea>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="sentiment-run">Analyze</button>
        <button class="kbt-tool-button ghost" id="sentiment-clear">Clear</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>Results</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>Sentiment</span><strong id="sentiment-label">--</strong></div>
        <div class="kbt-tool-stat"><span>Score</span><strong id="sentiment-score">0</strong></div>
        <div class="kbt-tool-stat"><span>Positive</span><strong id="sentiment-positive">0</strong></div>
        <div class="kbt-tool-stat"><span>Negative</span><strong id="sentiment-negative">0</strong></div>
      </div>
      <div class="kbt-tool-note">For detailed insights, use longer samples and add context.</div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const input = document.getElementById('sentiment-input');
  const runBtn = document.getElementById('sentiment-run');
  const clearBtn = document.getElementById('sentiment-clear');
  const labelEl = document.getElementById('sentiment-label');
  const scoreEl = document.getElementById('sentiment-score');
  const posEl = document.getElementById('sentiment-positive');
  const negEl = document.getElementById('sentiment-negative');

  if (!input || !runBtn) return;

  const positiveWords = [
    'good', 'great', 'love', 'awesome', 'amazing', 'nice', 'happy', 'thanks', 'thank', 'excellent',
    'cool', 'perfect', 'enjoy', 'positive', 'glad', 'sweet', 'brilliant', 'wonderful', 'best'
  ];
  const negativeWords = [
    'bad', 'hate', 'angry', 'sad', 'annoyed', 'terrible', 'awful', 'worst', 'upset', 'sorry',
    'problem', 'issue', 'slow', 'broken', 'disappointed', 'unhappy', 'stress', 'poor'
  ];

  function analyze() {
    const text = input.value.toLowerCase();
    const words = text.match(/[a-z']+/g) || [];
    let positive = 0;
    let negative = 0;

    words.forEach((word) => {
      if (positiveWords.includes(word)) positive += 1;
      if (negativeWords.includes(word)) negative += 1;
    });

    const score = positive - negative;
    let label = 'Neutral';
    if (score >= 2) label = 'Positive';
    if (score <= -2) label = 'Negative';

    labelEl.textContent = label;
    scoreEl.textContent = score;
    posEl.textContent = positive;
    negEl.textContent = negative;
  }

  runBtn.addEventListener('click', analyze);
  clearBtn.addEventListener('click', function () {
    input.value = '';
    labelEl.textContent = '--';
    scoreEl.textContent = '0';
    posEl.textContent = '0';
    negEl.textContent = '0';
  });
});
</script>
