<?php
/**
 * The "Remote-First / Fast Delivery / Timezone Friendly" hero badge row.
 * Originally only on location-city.php; every hub page should say this
 * explicitly since the business has no physical office in any client's
 * country -- all work is coordinated by call and email.
 */
function render_remote_badges(): string {
  return '
        <div class="mt-4 d-flex gap-4 flex-wrap">
          <div><span class="text-warning fw-bold">Remote-First</span><br><small class="text-light">No local office needed — work from anywhere</small></div>
          <div><span class="text-warning fw-bold">Fast Delivery</span><br><small class="text-light">7-21 day turnaround</small></div>
          <div><span class="text-warning fw-bold">Timezone Friendly</span><br><small class="text-light">Calls & email on your schedule</small></div>
        </div>';
}
