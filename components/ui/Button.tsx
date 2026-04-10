import Link from "next/link";

type ButtonProps = {
  children: React.ReactNode;
  variant?: "solid" | "outlined";
  href?: string;
  onClick?: () => void;
  className?: string;
  ariaLabel?: string;
};

export default function Button({
  children,
  variant = "solid",
  href,
  onClick,
  className = "",
  ariaLabel,
}: ButtonProps) {
  const base =
    "inline-block font-[family-name:var(--font-montserrat)] font-semibold uppercase tracking-wider text-sm px-8 py-3 rounded-full transition-colors duration-200 text-center cursor-pointer";
  const variants = {
    solid: "bg-teal text-white hover:bg-teal-dark",
    outlined: "border-2 border-teal text-teal hover:bg-teal hover:text-white",
  };
  const classes = `${base} ${variants[variant]} ${className}`;

  if (href) {
    return (
      <Link href={href} className={classes} aria-label={ariaLabel}>
        {children}
      </Link>
    );
  }

  return (
    <button onClick={onClick} className={classes} aria-label={ariaLabel}>
      {children}
    </button>
  );
}
