<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
<?php include 'includes/head-common.php'; ?>
    <style>
        .feedback-page {
            min-height: calc(100vh - var(--header-height, 70px) - 300px);
            padding: 4rem 0;
        }
        .feedback-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        .feedback-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        .feedback-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .feedback-header p {
            font-size: 1.125rem;
            color: var(--text-secondary);
        }
        .feedback-form {
            background: var(--surface-light);
            border: 1px solid var(--border-light);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--border-light);
            border-radius: 8px;
            font-size: 1rem;
            background: var(--bg-primary);
            color: var(--text-primary);
            transition: all 0.2s;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--accent-cyan);
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1);
        }
        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.125rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(56, 189, 248, 0.3);
        }
        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: none;
        }
        .alert.show {
            display: block;
        }
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }
        [data-theme="dark"] .feedback-form {
            background: var(--surface-dark);
            border-color: var(--border-dark);
        }
        [data-theme="dark"] .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: #6ee7b7;
            border-color: rgba(16, 185, 129, 0.3);
        }
        [data-theme="dark"] .alert-error {
            background: rgba(239, 68, 68, 0.1);
            color: #fca5a5;
            border-color: rgba(239, 68, 68, 0.3);
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main class="feedback-page">
        <div class="feedback-container">
            <div class="feedback-header">
                <h1>Send Us Your Feedback</h1>
                <p>Help us improve KeyboardTester.Click. We'd love to hear your thoughts, suggestions, or bug reports.</p>
            </div>

            <div class="alert alert-success" id="successAlert">
                <strong>Thank you!</strong> Your feedback has been sent successfully. We'll review it shortly.
            </div>
            <div class="alert alert-error" id="errorAlert">
                <strong>Oops!</strong> Something went wrong. Please try again or contact us directly at nasirazizawan@gmail.com.
            </div>

            <form class="feedback-form" id="feedbackForm" action="<?php echo url('api/send-feedback.php'); ?>" method="post" novalidate>
                <div class="form-group">
                    <label for="name">Your Name <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="name" name="name" required placeholder="John Doe">
                </div>

                <div class="form-group">
                    <label for="email">Your Email <span style="color: #ef4444;">*</span></label>
                    <input type="email" id="email" name="email" required placeholder="john@example.com">
                </div>

                <div class="form-group">
                    <label for="message">Your Message <span style="color: #ef4444;">*</span></label>
                    <textarea id="message" name="message" required placeholder="Tell us what you think or report an issue..."></textarea>
                </div>

                <div class="form-group" style="display: none;">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>

                <button type="submit" class="submit-btn">
                    <span class="btn-text">Send Feedback</span>
                    <span class="btn-loading" style="display: none;">Sending...</span>
                </button>
            </form>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script>
        document.getElementById('feedbackForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const btn = this.querySelector('.submit-btn');
            const btnText = btn.querySelector('.btn-text');
            const btnLoading = btn.querySelector('.btn-loading');
            const successAlert = document.getElementById('successAlert');
            const errorAlert = document.getElementById('errorAlert');
            
            // Hide alerts
            successAlert.classList.remove('show');
            errorAlert.classList.remove('show');
            
            // Disable button and show loading
            btn.disabled = true;
            btnText.style.display = 'none';
            btnLoading.style.display = 'inline';
            
            const formData = new FormData(this);
            
            try {
                const response = await fetch('<?php echo url('api/send-feedback.php'); ?>', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    successAlert.classList.add('show');
                    this.reset();
                } else {
                    errorAlert.classList.add('show');
                }
            } catch (error) {
                errorAlert.classList.add('show');
            } finally {
                // Re-enable button
                btn.disabled = false;
                btnText.style.display = 'inline';
                btnLoading.style.display = 'none';
            }
        });
    </script>
</body>
</html>

