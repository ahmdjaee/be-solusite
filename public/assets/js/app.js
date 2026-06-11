(function () {
  const root = document.documentElement;
  const storedTheme = localStorage.getItem("admin-theme");
  const initialTheme = storedTheme || "light";

  root.setAttribute("data-bs-theme", initialTheme);

  // Restore sidebar collapsed state before first paint
  if (localStorage.getItem("sidebar-collapsed") === "1") {
    document.body.classList.add("sidebar-collapsed");
  }

  function updateThemeIcon() {
    document.querySelectorAll("[data-theme-toggle] i").forEach((icon) => {
      icon.className = root.getAttribute("data-bs-theme") === "dark" ? "bi bi-sun" : "bi bi-moon-stars";
    });
  }

  function closeSidebar() {
    document.body.classList.remove("sidebar-open");
  }

  document.addEventListener("click", (event) => {
    const themeToggle = event.target.closest("[data-theme-toggle]");
    const sidebarToggle = event.target.closest("[data-sidebar-toggle]");
    const backdrop = event.target.closest(".sidebar-backdrop");
    const passwordToggle = event.target.closest("[data-password-toggle]");
    const sidebarCollapse = event.target.closest("[data-sidebar-collapse]");

    if (sidebarCollapse) {
      const collapsed = document.body.classList.toggle("sidebar-collapsed");
      localStorage.setItem("sidebar-collapsed", collapsed ? "1" : "0");
    }

    if (themeToggle) {
      const nextTheme = root.getAttribute("data-bs-theme") === "dark" ? "light" : "dark";
      root.setAttribute("data-bs-theme", nextTheme);
      localStorage.setItem("admin-theme", nextTheme);
      updateThemeIcon();
      initCharts();
    }

    if (sidebarToggle) {
      document.body.classList.toggle("sidebar-open");
    }

    if (backdrop) {
      closeSidebar();
    }

    if (passwordToggle) {
      const target = document.querySelector(passwordToggle.dataset.passwordToggle);
      const icon = passwordToggle.querySelector("i");
      if (target) {
        target.type = target.type === "password" ? "text" : "password";
        if (icon) icon.className = target.type === "password" ? "bi bi-eye" : "bi bi-eye-slash";
      }
    }

  });

  document.addEventListener("change", function (event) {
    const checkAll = event.target.closest("[data-check-all]");
    if (checkAll) {
      document.querySelectorAll(checkAll.dataset.checkAll).forEach((checkbox) => {
        checkbox.checked = checkAll.checked;
      });
    }

  });

  updateThemeIcon();

  /* Chart.js */
  var chartInstances = new Map();

  function hexToRgba(hex, alpha) {
    var r = parseInt(hex.slice(1, 3), 16);
    var g = parseInt(hex.slice(3, 5), 16);
    var b = parseInt(hex.slice(5, 7), 16);
    return 'rgba(' + r + ',' + g + ',' + b + ',' + alpha + ')';
  }

  function buildChartInstance(canvas, cfg) {
    var cs   = getComputedStyle(document.documentElement);
    var text  = cs.getPropertyValue('--app-text').trim()   || '#1e293b';
    var muted = cs.getPropertyValue('--app-muted').trim()  || '#94a3b8';
    var grid  = cs.getPropertyValue('--app-border').trim() || '#e2e8f0';
    var dark  = root.getAttribute('data-bs-theme') === 'dark';
    var tooltipBg = dark ? '#1e293b' : '#ffffff';

    var palette = ['#1769e0','#22c55e','#f59e0b','#94a3b8','#8b5cf6','#ec4899','#06b6d4'];
    var round   = cfg.type === 'doughnut' || cfg.type === 'pie';

    var chartH = canvas.parentElement ? (canvas.parentElement.offsetHeight || 240) : 240;

    var datasets = (cfg.datasets || []).map(function (ds, i) {
      var col = ds.color || palette[i % palette.length];
      var bg;
      if (round) {
        bg = ds.colors || ds.data.map(function (_, j) { return palette[j % palette.length]; });
      } else if (cfg.type === 'bar' && ds.gradient) {
        var ctx  = canvas.getContext('2d');
        var grad = ctx.createLinearGradient(0, 0, 0, chartH);
        grad.addColorStop(0,   hexToRgba(col, 0.92));
        grad.addColorStop(0.6, hexToRgba(col, 0.55));
        grad.addColorStop(1,   hexToRgba(col, 0.08));
        bg = grad;
      } else if (cfg.type === 'line' && ds.fill) {
        bg = hexToRgba(col, 0.12);
      } else {
        bg = hexToRgba(col, 0.85);
      }
      return {
        label: ds.label || '',
        data:  ds.data  || [],
        backgroundColor:    bg,
        borderColor:        round ? (dark ? '#1e293b' : '#ffffff') : col,
        borderWidth:        cfg.type === 'line' ? 2.5 : (round ? 2 : 0),
        borderRadius:       cfg.type === 'bar'  ? 6   : 0,
        borderSkipped:      false,
        tension:            0.4,
        fill:               ds.fill || false,
        pointBackgroundColor: col,
        pointRadius:        cfg.type === 'line' ? 3 : 0,
        pointHoverRadius:   cfg.type === 'line' ? 5 : 0,
        hoverOffset:        round ? 8 : 0,
      };
    });

    var scaleOpts = round ? {} : {
      x: {
        grid:   { display: false },
        ticks:  { color: muted, font: { size: 11, family: 'system-ui, sans-serif' } },
        border: { display: false },
      },
      y: {
        grid:   { color: grid },
        ticks:  { color: muted, font: { size: 11, family: 'system-ui, sans-serif' } },
        border: { display: false },
      },
    };

    return new Chart(canvas, {
      type: cfg.type || 'bar',
      data: { labels: cfg.labels || [], datasets: datasets },
      options: {
        responsive:          true,
        maintainAspectRatio: false,
        interaction: { intersect: false, mode: 'index' },
        plugins: {
          legend: {
            display:  cfg.legend || false,
            position: 'bottom',
            labels: {
              color:           text,
              boxWidth:        10,
              boxHeight:       10,
              usePointStyle:   true,
              pointStyleWidth: 10,
              padding:         16,
              font: { size: 12, family: 'system-ui, sans-serif' },
            },
          },
          tooltip: {
            backgroundColor: tooltipBg,
            titleColor:      text,
            bodyColor:       muted,
            borderColor:     grid,
            borderWidth:     1,
            padding:         10,
            cornerRadius:    8,
            titleFont: { size: 12, family: 'system-ui, sans-serif', weight: '500' },
            bodyFont:  { size: 12, family: 'system-ui, sans-serif' },
          },
        },
        scales: scaleOpts,
      },
    });
  }

  function initCharts() {
    chartInstances.forEach(function (inst) { inst.destroy(); });
    chartInstances.clear();
    if (!window.Chart) return;
    Chart.defaults.font.family = 'system-ui, sans-serif';
    document.querySelectorAll('[data-chart]').forEach(function (canvas) {
      try {
        var cfg = JSON.parse(canvas.dataset.chart);
        chartInstances.set(canvas, buildChartInstance(canvas, cfg));
      } catch (e) {
        console.warn('Chart init error:', e);
      }
    });
  }

  initCharts();

  /* Kanban */
  function updateKanbanCounts(board) {
    board.querySelectorAll(".kanban-col").forEach(function (column) {
      const count = column.querySelector(".kanban-count");
      const cards = column.querySelectorAll(".kanban-card");
      if (count) count.textContent = cards.length;
    });
  }

  function initKanbanBoards() {
    if (!window.Sortable) return;

    document.querySelectorAll("[data-kanban-board]").forEach(function (board) {
      const group = board.dataset.kanbanGroup || "codex-kanban";

      board.querySelectorAll("[data-kanban-list]").forEach(function (list) {
        if (list.dataset.sortableReady === "1") return;
        list.dataset.sortableReady = "1";

        Sortable.create(list, {
          animation: 180,
          chosenClass: "kanban-card-chosen",
          dragClass: "kanban-card-drag",
          draggable: ".kanban-card",
          easing: "cubic-bezier(.2, 0, 0, 1)",
          emptyInsertThreshold: 18,
          fallbackOnBody: true,
          ghostClass: "kanban-card-ghost",
          group,
          swapThreshold: 0.7,
          onStart: function () {
            board.classList.add("is-sorting");
          },
          onEnd: function (event) {
            board.classList.remove("is-sorting");
            updateKanbanCounts(board);

            board.dispatchEvent(new CustomEvent("kanban:change", {
              bubbles: true,
              detail: {
                item: event.item,
                fromColumn: event.from.closest(".kanban-col")?.dataset.colId || null,
                toColumn: event.to.closest(".kanban-col")?.dataset.colId || null,
                oldIndex: event.oldIndex,
                newIndex: event.newIndex
              }
            }));
          }
        });
      });

      updateKanbanCounts(board);
    });
  }

  initKanbanBoards();

  /* Calendar */
  function setCalendarToolbarState(shell, calendar) {
    const title = shell.querySelector("[data-calendar-title]");
    if (title) title.textContent = calendar.view.title;

    shell.querySelectorAll("[data-calendar-view]").forEach(function (button) {
      const isActive = button.dataset.calendarView === calendar.view.type;
      button.classList.toggle("active", isActive);
      button.classList.toggle("btn-primary", isActive);
      button.classList.toggle("btn-outline-primary", !isActive);
    });
  }

  function initCalendars() {
    if (!window.FullCalendar) return;

    document.querySelectorAll("[data-calendar]").forEach(function (element) {
      if (element.dataset.calendarReady === "1") return;
      element.dataset.calendarReady = "1";

      const shell = element.closest("[data-calendar-shell]") || element.parentElement || document;
      let events = [];

      try {
        events = JSON.parse(element.dataset.calendarEvents || "[]");
      } catch (error) {
        console.warn("Calendar events could not be parsed:", error);
      }

      const calendar = new FullCalendar.Calendar(element, {
        allDaySlot: true,
        dayMaxEventRows: 3,
        editable: true,
        eventDisplay: "block",
        events,
        expandRows: true,
        firstDay: 0,
        headerToolbar: false,
        height: "auto",
        initialDate: element.dataset.calendarInitialDate || undefined,
        initialView: element.dataset.calendarInitialView || "dayGridMonth",
        nowIndicator: true,
        selectable: true,
        slotMinTime: "07:00:00",
        slotMaxTime: "20:00:00",
        eventClick: function (info) {
          if (!window.showToast) return;
          const label = info.event.extendedProps.label || "Event";
          showToast(info.event.title, label, "info", 2600);
        },
        datesSet: function () {
          setCalendarToolbarState(shell, calendar);
        }
      });

      shell.querySelector("[data-calendar-prev]")?.addEventListener("click", function () {
        calendar.prev();
      });

      shell.querySelector("[data-calendar-next]")?.addEventListener("click", function () {
        calendar.next();
      });

      shell.querySelector("[data-calendar-today]")?.addEventListener("click", function () {
        calendar.today();
      });

      shell.querySelectorAll("[data-calendar-view]").forEach(function (button) {
        button.addEventListener("click", function () {
          calendar.changeView(button.dataset.calendarView);
        });
      });

      calendar.render();
      element.calendarInstance = calendar;
    });
  }

  initCalendars();

  /* Toast system */
  const TOAST_ICONS = { info: 'bi-info-circle-fill', success: 'bi-check-circle-fill', warning: 'bi-exclamation-triangle-fill', danger: 'bi-x-circle-fill' };

  window.showToast = function (title, message, type, duration) {
    message  = message  || '';
    type     = type     || 'info';
    duration = duration !== undefined ? duration : 4000;
    const stack = document.getElementById('toastStack');
    if (!stack) return;
    const item = document.createElement('div');
    item.className = 'toast-item toast-' + type;
    item.innerHTML =
      '<span class="toast-icon"><i class="bi ' + (TOAST_ICONS[type] || TOAST_ICONS.info) + '"></i></span>' +
      '<div class="toast-body">' +
        '<div class="toast-title">' + title + '</div>' +
        (message ? '<div class="toast-message">' + message + '</div>' : '') +
      '</div>' +
      '<button class="toast-close" aria-label="Dismiss"><i class="bi bi-x"></i></button>';
    const dismiss = function () {
      item.classList.add('toast-leaving');
      item.addEventListener('animationend', function () { item.remove(); });
    };
    item.querySelector('.toast-close').addEventListener('click', dismiss);
    stack.appendChild(item);
    if (duration > 0) setTimeout(dismiss, duration);
  };

  document.addEventListener('click', function (e) {
    const trigger = e.target.closest('[data-toast]');
    if (!trigger) return;
    showToast(
      trigger.dataset.toastTitle   || 'Notification',
      trigger.dataset.toastMessage || '',
      trigger.dataset.toastType    || 'info'
    );
  });

  if (window.bootstrap) {
    document.querySelectorAll("[data-bs-toggle='tooltip']").forEach((element) => {
      new bootstrap.Tooltip(element);
    });
  }

  document.querySelectorAll("[data-table]").forEach(function (table) {
    if (!window.simpleDatatables) return;

    // Capture check-all info BEFORE datatable rebuilds the thead
    var checkAllOrig = table.querySelector("thead th [data-check-all]");
    var checkAllSelector = checkAllOrig ? checkAllOrig.dataset.checkAll : null;
    var checkAllColIdx  = checkAllOrig
      ? Array.from(table.querySelectorAll("thead th")).indexOf(checkAllOrig.closest("th"))
      : -1;

    var perPage = Number(table.dataset.perPage || 8);
    new simpleDatatables.DataTable(table, {
      searchable: true,
      fixedHeight: false,
      perPage,
      perPageSelect: [5, 8, 10, 25, 50],
      labels: {
        placeholder: "Search data...",
        searchTitle: "Search table",
        perPage: "entries per page",
        noRows: "No records yet",
        noResults: "No matching records found",
        info: "Showing {start} to {end} of {rows} entries"
      }
    });
    table.closest(".table-card")?.classList.add("is-enhanced");

    // Re-inject checkbox into the rebuilt thead
    if (checkAllSelector !== null && checkAllColIdx >= 0) {
      var ths = table.querySelectorAll("thead tr th");
      var targetTh = ths[checkAllColIdx];
      if (targetTh) {
        var cb = document.createElement("input");
        cb.type = "checkbox";
        cb.className = "form-check-input";
        cb.setAttribute("aria-label", "Select all");
        targetTh.innerHTML = "";
        targetTh.appendChild(cb);

        cb.addEventListener("change", function () {
          table.querySelectorAll(checkAllSelector).forEach(function (row) {
            row.checked = cb.checked;
          });
        });

        table.addEventListener("change", function (e) {
          if (e.target === cb || !e.target.matches(checkAllSelector)) return;
          var all = Array.from(table.querySelectorAll(checkAllSelector));
          cb.checked = all.length > 0 && all.every(function (r) { return r.checked; });
          cb.indeterminate = !cb.checked && all.some(function (r) { return r.checked; });
        });
      }
    }
  });

  function initSelect2(select) {
    if (!window.jQuery || !jQuery.fn.select2) return;

    const element = jQuery(select);
    if (element.hasClass("select2-hidden-accessible")) return;

    const modal = element.closest(".modal");
    const width = select.style.width || select.style.maxWidth || "100%";

    element.select2({
      closeOnSelect: !select.multiple,
      dropdownParent: modal.length ? modal : jQuery(document.body),
      placeholder: select.dataset.placeholder || "Select an option",
      width
    });
  }

  function initSelect2Controls() {
    document.querySelectorAll('select[data-control="select2"]').forEach(initSelect2);
  }

  initSelect2Controls();
  if (window.jQuery) jQuery(initSelect2Controls);
  window.addEventListener("load", initSelect2Controls);
})();
