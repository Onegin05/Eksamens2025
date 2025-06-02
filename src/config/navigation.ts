
export type NavigationItem = {
  title: string;
  path: string;
  implemented?: boolean;
};

export type NavigationGroup = {
  title: string;
  items: NavigationItem[];
};

export const mainNavigation: NavigationItem[] = [
  {
    title: "Sākums",
    path: "/",
    implemented: true,
  },
  {
    title: "Kalkulators",
    path: "/calculator",
    implemented: true,
  },
  {
    title: "Finanšu Blogs",
    path: "/blog",
    implemented: true,
  },
  {
    title: "Naudas Padomi",
    path: "/tips",
    implemented: true,
  },
  {
    title: "Finanšu Rīki",
    path: "/tools",
    implemented: true,
  },
  {
    title: "Par Mums",
    path: "/about",
    implemented: true,
  },
];

export const footerNavigation: NavigationGroup[] = [
  {
    title: "Resursi",
    items: [
      {
        title: "Finanšu Blogs",
        path: "/blog",
        implemented: true,
      },
      {
        title: "Naudas Padomi",
        path: "/tips",
        implemented: true,
      },
      {
        title: "Finanšu Rīki",
        path: "/tools",
        implemented: true,
      },
      {
        title: "Testēšanas Dokumentācija",
        path: "/testing",
        implemented: true,
      },
    ],
  },
  {
    title: "Uzņēmums",
    items: [
      {
        title: "Par Mums",
        path: "/about",
        implemented: true,
      },
      {
        title: "Karjera",
        path: "/careers",
        implemented: true,
      },
      {
        title: "Sazināties",
        path: "/contact",
        implemented: true,
      },
    ],
  },
  {
    title: "Juridiskā Informācija",
    items: [
      {
        title: "Privātuma Politika",
        path: "/privacy",
        implemented: true,
      },
      {
        title: "Lietošanas Noteikumi",
        path: "/terms",
        implemented: true,
      },
      {
        title: "Biežāk Uzdotie Jautājumi",
        path: "/faq",
        implemented: true,
      },
    ],
  },
];
