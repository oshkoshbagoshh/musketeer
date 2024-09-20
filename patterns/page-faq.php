<?php
/*
Template Name: FAQ Page
*/

get_header();
?>

<!-- Paste the HTML here -->
<div class="faq-container">
  <h1 class="faq-title">FAQs</h1>
  
  <div class="faq-grid">
    <div class="faq-item">
      <h2 class="faq-question">What is the advantage of hiring a consultant instead of doing it in-house?</h2>
      <div class="faq-answer">
        <p>Hiring a consultant offers several advantages:</p>
        <ul>
          <li>Specialized expertise and experience</li>
          <li>Fresh, objective perspective</li>
          <li>Cost-effective for short-term projects</li>
          <li>Access to industry best practices</li>
          <li>Flexibility and scalability</li>
        </ul>
      </div>
    </div>
    
    <div class="faq-item">
      <h2 class="faq-question">What kind of deliverables are to be expected?</h2>
      <div class="faq-answer">
        <p>Deliverables may vary depending on the project, but typically include:</p>
        <ul>
          <li>Detailed project reports</li>
          <li>Strategic recommendations</li>
          <li>Implementation plans</li>
          <li>Data analysis and visualizations</li>
          <li>Training materials or workshops</li>
        </ul>
      </div>
    </div>
    
    <div class="faq-item">
      <h2 class="faq-question">How long will the project take and how long until results can be measured?</h2>
      <div class="faq-answer">
        <p>Project timelines and result measurements vary based on complexity:</p>
        <ul>
          <li>Short-term projects: 1-3 months, with initial results visible within weeks</li>
          <li>Medium-term projects: 3-6 months, with measurable outcomes in 2-3 months</li>
          <li>Long-term projects: 6-12+ months, with ongoing measurements and milestones</li>
        </ul>
        <p>We provide regular updates and progress reports throughout the project lifecycle.</p>
      </div>
    </div>
  </div>
</div>

<style>
  .faq-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
    font-family: Arial, sans-serif;
  }
  
  .faq-title {
    text-align: center;
    color: #ffffff;
    font-size: 2.5rem;
    margin-bottom: 2rem;
  }
  
  .faq-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
  }
  
  .faq-item {
    background-color: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  .faq-question {
    background-color: #6b46c1;
    color: #ffffff;
    padding: 1rem;
    margin: 0;
    font-size: 1.2rem;
  }
  
  .faq-answer {
    padding: 1rem;
  }
  
  .faq-answer p, .faq-answer ul {
    margin-top: 0;
  }
  
  body {
    background-color: #4a148c;
    background-image: linear-gradient(135deg, #4a148c 0%, #7b1fa2 100%);
  }
</style>

<?php
get_footer();
?>
